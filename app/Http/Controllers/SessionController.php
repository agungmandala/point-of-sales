<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $credentials = $req->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $admin = Admin::where('username', $req->username)->first();
            $req->session()->regenerate();
            $req->session()->put("name", $admin->name);
 
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'login' => 'Username dan password salah!',
        ]);
    }

    public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();

        return redirect('/');
    }
}
