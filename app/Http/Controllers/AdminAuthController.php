<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /*
    |----------------------
    | LOGIN FORM
    |----------------------
    */
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    /*
    |----------------------
    | LOGIN PROCESS
    |----------------------
    */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            // WAJIB ADMIN
            if ($user->role !== 'admin') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Anda bukan admin'
                ]);
            }

            return redirect('/admin');
        }

        return back()->withErrors([
            'email' => 'Login gagal'
        ]);
    }

    /*
    |----------------------
    | REGISTER FORM
    |----------------------
    */
    public function showRegister()
    {
        return view('admin.auth.register');
    }

    /*
    |----------------------
    | REGISTER ADMIN
    |----------------------
    */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        Auth::login($user);

        return redirect('/admin');
    }
}