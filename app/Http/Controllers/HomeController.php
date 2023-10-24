<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $id = Auth()->id();
        $users = DB::table('users')->where('id',$id)->get();
        return view('home',["users"=>$users]);
    }
}
