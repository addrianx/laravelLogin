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
        $user = DB::table('users')->where('id',$id)->get();
        $all_users = DB::table('users')->get();
        $members = [];
        //print_r($user[0]->role); die;

        if ($user[0]->role === 'admin'){
            $members = DB::table('users')->where('role', 'member')->get();
        }

        return view('home',["users"=>$user, "all_users"=>$all_users, "members"=>$members]);
    }


    public function deleteMember($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Data member berhasil dihapus');
    }
}
