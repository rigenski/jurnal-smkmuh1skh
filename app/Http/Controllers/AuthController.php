<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|string',
        ]);

        Auth::attempt($request->only('username', 'password'));

        if (Auth::check()) {
            return redirect()->route('home')->with('success', 'Login telah berhasil!');
        }

        return redirect()->route('login')->with('error', 'Username atau Password salah!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
