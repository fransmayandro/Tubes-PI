<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $user =new User();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->name);

        $user->save();

        return back()->with('success', 'Register berhasil');
    }

    public function login()
    {
        return view('login');
    } 

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/home')->with('success', 'Login berhasil');
        }
        return back()->with('error', 'Email atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout berhasil');
    } 
}
