<?php
namespace App\Http\Controllers\Dashboard;
use App\Models\Admin;
use App\Enums\AdminType;
use Illuminate\Http\Request;
use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;

class AdminController extends Controller {
    public function index(AdminDataTable $dataTable) {
        return $dataTable->render('dashboard.admins.index');
    }

    public function store(Request $request) {
        if ($request->has('admin_type') && $request->input('admin_type') == 'admin') {
            Admin::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'status' => true,
                'type' => AdminType::SUPERVISOR,
            ]); 
        }
        return redirect()->route('admins.index');
    }

    public function update(Request $request) {
        try {
            Admin::whereId($request->id)->update($request->only(['name', 'email']));
            return redirect()->route('admins.index');
        } catch(\Exception $ex){
            return redirect()->route('admins.index');
        }
    }

    public function changeStatus(Request $request) {
        try {
            $request->request->add(['status' => $request->has('status') ? true : false]);
            Admin::whereId($request->id)->update($request->only(['status']));
            return redirect()->route('admins.index');
        } catch(\Exception $ex){
            return redirect()->route('admins.index');
        }
    }
    public function destroy(Request $request) {
        try {
            Admin::whereId($request->id)->delete();
            return redirect()->route('admins.index');
        } catch(\Exception $ex){
            return redirect()->route('admins.index');
        }
    }
}