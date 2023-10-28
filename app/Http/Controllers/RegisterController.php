<?php

namespace App\Http\Controllers;

use Request;
use App\Models\User;


class RegisterController extends Controller
{
    //
    public function register(){
        return view('register');
    }


    /**
     * Data Dari Form Register dicek terus disimpan ke database bosquee!.
     *
     */
    public function SaveUser(){
        //dd(Request::post());

        $this->validate(request(), [
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

         // Set pesan konfirmasi
         session()->flash('success', 'Pendaftaran berhasil! Silahkan login.');

        return redirect('/');
    }
}
