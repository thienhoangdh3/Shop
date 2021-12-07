<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $id = session('id');
        $data = User::find(session('id'));
        return view('profile_user.index')->with(compact('data', 'id'));
    }

    public function edit()
    {
        $id = session('id');
        $data = User::find(session('id'));
        return view('profile_user.update')->with(compact('data', 'id'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'fullname' => $request->fullname,
        ]);
        if($request->hasfile('avatar')){
            if(isset($user->avatar)){
                // $img = json_decode($user->avatar, true);
                $destination = "/avatars/" . $user->avatar;
                Storage::delete($destination);
            }

            $nameAvatar = $user->id . '.' . $request->file('avatar')->extension();
            $request->file('avatar')->storeAs('avatars', $nameAvatar); 
            User::where('id', $id)->update(['avatar' => $nameAvatar]);
            session(['avatar' => $nameAvatar]);
        }

        return redirect(route('user-profile'));
    }

    public function myOrder($id)
    {
        $data = User::join('reciepts', 'reciepts.user_id', '=', 'users.id')
                    ->join('nicks', 'nicks.id', '=', 'reciepts.nick_id')
                    ->select([
                        'users.id as id',
                        'reciepts.code as code',
                        'nicks.id as nick_id',
                        'nicks.price as price',
                        'nicks.ingame as ingame',
                        'nicks.username as username',
                        'nicks.password as password',
                        'reciepts.created_at as created_at',
                    ])
                    ->where('users.id', $id)
                    ->get(); 
        return view('profile_user.my-order')->with(compact('data', 'id'));
    }
}
