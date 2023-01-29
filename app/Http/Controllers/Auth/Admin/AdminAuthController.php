<?php
namespace App\Http\Controllers\Auth\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
class AdminAuthController extends Controller {
    public function index() {
        return view('auth.admin.login');
    }

    public function store(AdminLoginRequest $request) {
        $check = $request->all();
        $remember = $request->has('remember');
        if(admin_guard()->attempt(['email' => $check['email'], 'password' => $check['password']], $remember)) {
            if(admin_guard()->user()?->status == 0) {
                admin_guard()->logout();
                return redirect()->route('admin.login');
            } else {
                return redirect()->route('admin.dashboard');
            }
        }else {
            return redirect()->back();
        }
    }


    public function destroy(Request $request) {
        admin_guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

}