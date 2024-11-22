<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class LoginController
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login - Manajemen Perpustakaan',
        ]);
    }

    public function login(Login $request)
    {
        $data = $request->validated();

        if (! Auth::attempt($data)) {
            return Response::redirectTo('/login')->with('error', 'Email atau password salah')->withInput([
                'username' => $data['username'],
            ]);
        }

        return Response::redirectTo('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return Response::redirectTo('/login');
    }
}
