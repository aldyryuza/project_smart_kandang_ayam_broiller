<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Load Halaman Login
    public function index()
    {
        return view('content.login.login');
    }

    // menjalankan login
    public function run(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home')->with(['success' => 'Login Berhasil']);
        }

        return back()->with('loginErorr', 'Login Failed!!');
    }
    // menjalankan Perintah logout
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with(['success' => 'Logout Berhasil']);
    }
}
