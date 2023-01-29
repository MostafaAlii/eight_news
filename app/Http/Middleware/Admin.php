<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class Admin {
    public function handle(Request $request, Closure $next) {
        if(!admin_guard()->check()){
            return redirect()->route('admin.login')->with('error', 'Please login first');
        }
        return $next($request);
    }
}