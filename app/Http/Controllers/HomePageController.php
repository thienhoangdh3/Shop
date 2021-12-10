<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nick;
use App\Models\User;
use App\Models\Reciept;

class HomePageController extends Controller
{
    public function index()
    {
        $datas = Nick::where('status', '1')->orderBy('created_at')->paginate(12);
        return view('layouts.main')->with(compact('datas'));
    }

    public function view($id)
    {
        $datas = Nick::find($id);
        return view('public.view')->with(compact('datas'));
    }

    public function buy($id)
    {
        $user = User::find(session('id'));
        $nick = Nick::find($id);

        if($user->money > $nick->price){
            Reciept::create([
                'code' => $user->id . $id . rand(10000,99999),
                'user_id' => $user->id,
                'nick_id' => $id
            ]);

            User::where('id', $user->id)->update([
                'money' => $user->money - $nick->price
            ]);

            Nick::where('id', $id)->update([
                'status' => '0',
            ]);
        }
        return redirect()->route('home'); 
    }
}
