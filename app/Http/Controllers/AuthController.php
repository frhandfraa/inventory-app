<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | USER VIEW
    |--------------------------------------------------------------------------
    */

    public function showUserLogin()
    {
        return view('auth.login');
    }

    public function showUserRegister()
    {
        return view('auth.register');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN VIEW
    |--------------------------------------------------------------------------
    */

    public function showAdminLogin()
    {
        return view('admin.auth.login');
    }

    public function showAdminRegister()
    {
        return view('admin.auth.register');
    }

    /*
    |--------------------------------------------------------------------------
    | USER REGISTER
    |--------------------------------------------------------------------------
    */

    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('users.dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | USER LOGIN
    |--------------------------------------------------------------------------
    */

    public function userLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role === 'user') {
                return redirect()->route('users.dashboard');
            }

            Auth::logout();
            return back()->withErrors([
                'email' => 'Akun ini bukan user'
            ]);
        }

        return back()->withErrors([
            'email' => 'Login gagal'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN REGISTER
    |--------------------------------------------------------------------------
    */

    public function adminRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        Auth::login($admin);

        return redirect()->route('admin.home');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN LOGIN
    |--------------------------------------------------------------------------
    */

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.home');
            }

            Auth::logout();
            return back()->withErrors([
                'email' => 'Akun ini bukan admin'
            ]);
        }

        return back()->withErrors([
            'email' => 'Login gagal'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }
}