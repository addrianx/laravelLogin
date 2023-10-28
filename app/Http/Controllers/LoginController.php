<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    //login
    public function login()
    {
        // $this->validate(request(), [
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        if (Auth::check())
        {
            return redirect('home');
        }
        else
        {
            return view('login');
        }
    }

    public function loginaksi(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data))
        {
            return redirect('home');
        }
        else
        {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function logoutaksi()
    {
        Auth::logout();

        session()->flash('success', 'Anda Telah Logout.');
        return redirect('/');
    }

}
