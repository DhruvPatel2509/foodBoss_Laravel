<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    function loginProcess(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $role = auth()->user()->role;

            if ($role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($role === 'user') {
                return redirect('/');
            }
        }


        return view('auth.login');
    }

    function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
