<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function login()
    {
        return view('admin.auth.login');
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function admin_login(Request $request)
    {
        $remeber = isset($request->remember) ? true : false;

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remeber)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login Successful');
        } else {
            return redirect()->route('admin.login')->with('error', 'Invalid Credentials');
        }
    }
}
