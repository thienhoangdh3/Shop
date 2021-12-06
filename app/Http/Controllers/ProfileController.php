<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $data = User::find(session('id'));
        return view('profile_user.index')->with(compact('data'));
    }

    public function myOrder($id)
    {
        $data = User::find(1)->with('reciept:id,user_id,nick_id,code')->get();
        dd($data);
    }
}
