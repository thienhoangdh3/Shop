<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Hash;

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
                $destination = '/avatars/' . $user->avatar;
                Storage::delete($destination);
            }

            $nameAvatar = $user->id . '.' . $request->file('avatar')->extension();
            $request->file('avatar')->storeAs('avatars', $nameAvatar); 
            User::where('id', $id)->update(['avatar' => $nameAvatar]);
            session(['avatar' => $nameAvatar]);
        }

        return redirect(route('user-profile'))->with('alert_success', 'Thay đổi thông tin thành công');
    }

    public function myOrder()
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
                    ->where('users.id', session('id'))
                    ->get(); 
        return view('profile_user.my-order')->with(compact('data'));
    }

    public function changePass()
    {
        $id = session('id');
        return view('profile_user.change-pass')->with(compact('id'));
    }

    public function postChangePass(Request $request, $id)
    {
        $messages = [
            'password_confirm.same'  => 'Nhập lại mật khẩu không trùng khớp',
            'password_new.min'       => 'Mật khẩu mới phải lớn hơn 6 ký tự',
            'password_new.max'       => 'Mật khẩu mới phải nhỏ hơn 30 ký tự',
            'password_new.different' => 'Mật khẩu mới phải khác mật khẩu cũ',
        ];
        
        $validated = $request->validate([
            'password_confirm' => 'same:password_new|required',
            'password_new'     => 'min:6|max:30|different:password_old',
        ], $messages);

        $user = User::find($id);
        if (Hash::check($request->input('password_old'), $user->password)) {
            User::where('id', $id)->update(['password' => Hash::make($request->input('password_new'))]);
        }

        return redirect()->back()->with('alert_success', 'Thay đổi mật khẩu thành công');
    }
}
