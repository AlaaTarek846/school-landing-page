<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:200',
            'password' => 'required|max:200',
            'remember' => 'required|in:1,0',
        ]);

        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            return responseJson([],__('translation.The provided credentials do not match our records'),400);
        }

        if (Auth::attempt($request->only('email', 'password'),$request->remember)) {
            $request->session()->regenerate();
            return responseJson('',__('website.Thanks for contacting us, we will get back to you soon'),200);
        }

        return responseJson([],__('translation.The provided credentials do not match our records'),400);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    /**
     * Show the registration form
     */
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }
    
    /**
     * Handle client registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'client',
        ]);
        
        event(new Registered($user));
        
        Auth::login($user);
        
        return redirect()->route('home');
    }

    public function showForgetPassword()
    {
        return view('admin.auth.forgot-password');
    }

    public function showResetPassword()
    {
        return view('admin.auth.reset-password');
    }

    public function showVerify()
    {
        return view('admin.auth.verify-phone');
    }

}
