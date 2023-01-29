<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\User;
use App\Enums\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\UserDataTable;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable) {
        return $dataTable->render('dashboard.users.index');
    }

    public function store(Request $request) {
        if ($request->has('admin_type') && $request->input('admin_type') == 'admin') {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'status' => true,
                'type' => UserType::NORMAL_USER,
            ]); 
        }
        return redirect()->route('users.index');
    }

    public function update(Request $request) {
        try {
            User::whereId($request->id)->update($request->only(['name', 'email']));
            return redirect()->route('users.index');
        } catch(\Exception $ex){
            return redirect()->route('users.index');
        }
    }


    public function changeStatus(Request $request) {
        try {
            $request->request->add(['status' => $request->has('status') ? true : false]);
            User::whereId($request->id)->update($request->only(['status']));
            return redirect()->route('users.index');
        } catch(\Exception $ex){
            return redirect()->route('users.index');
        }
    }
    public function destroy(Request $request) {
        try {
            User::whereId($request->id)->delete();
            return redirect()->route('users.index');
        } catch(\Exception $ex){
            return redirect()->route('users.index');
        }
    }
}