<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Storage;

class AdminController extends Controller
{
    public function index()
    {

        return view('profile_admin.index');
    }

    public function listUser()
    {
        $datas = User::paginate(10);
        return view('profile_admin.user.list')->with(compact('datas'));
    }

    public function create()
    {
        return view('profile_admin.user.create');
    }

    public function store(Request $request)
    {       
        $messages = [
            'password_confirm.same'  => 'Nhập lại mật khẩu không trùng khớp',
            'password.min'           => 'Mật khẩu mới phải lớn hơn 6 ký tự',
            'password.max'           => 'Mật khẩu mới phải nhỏ hơn 30 ký tự',
            'email.unique'           => 'Email đã được sử dụng',
        ];
    
        $validated = $request->validate([
            'password_confirm' => 'same:password|required',
            'password'         => 'min:6|max:30',
            'email'            => 'unique:users,email',
        ], $messages);

        if($file=$request->file('avatar')){
            $name=$request->email;
            // var_dump($name);die;
            $extention = $file->getClientOriginalExtension();
            $fullpath = $name.'.'.$extention;
            $file->storeAs('/avatars', $fullpath);  
        }else{
            $fullpath = 'NULL';
        }

        $createUser = User::create([
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'avatar'   => $fullpath,
            'password' => bcrypt($request->password),
            'admin'    => '0',
        ]);

        return redirect(route('admin.user.list'));
    }

    public function edit($id)
    {
        $datas = User::find($id);

        return view('profile_admin.user.edit')->with(compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->email !== $request->input('email')) {
            $users = User::where('email', $request->input('email'))
                        ->where('id', '<>', $user->id)
                        ->count();
            if ($users) {
                return redirect(route('admin.user.edit', $user->id))->with('alert_error', 'Email đã được sử dụng');
            }
        }

        $user->update([
            'fullname' => $request->fullname,
            'email'    => $request->email,
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

        return redirect()->back()->with([compact('user'), 'alert_success' => 'Thay đổi thông tin thành công']);
    }
}
