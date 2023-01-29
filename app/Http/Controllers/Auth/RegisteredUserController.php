<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Enums\UserType;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $sections = Section::getActive();
        return view('auth.register', ['sections' => $sections]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'type' => ['required', 'string', 'in:Publisher,User'],
            'section_id' => ['required', 'integer', 'exists:'.Section::class.',id'],
            'age' => ['required', 'integer', 'min:18', 'max:100'],
            'phone' => ['required', 'string', 'min:11', 'max:11'],
            'twitter_link' => ['required', 'string', 'url'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'status' => false,
            'section_id' => $request->section_id,
            'age' => $request->age,
            'phone' => $request->phone,
            'twitter_link' => $request->twitter_link,
        ]);

        event(new Registered($user));
        if(!$user->status == true){
            return redirect()->route('login')->with('error', 'عفوا لا يمكنك تسجيل الدخول حتى يتم تفعيل حسابك من قبل المشرف');
        }
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}