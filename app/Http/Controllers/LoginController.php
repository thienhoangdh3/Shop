<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mail;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $validated = $request->validated();
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        $isUser = User::where('email',$email)->first();
        if ($isUser) {
            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                $session = $isUser->toArray();    
                
                if($isUser->admin == "0"){
                    session()->put($session);
                    return redirect(route('admin.index'));
                }else{
                    session()->put($session);
                    return redirect(route('home'));
                }
            }else{
                return redirect(route('login'))->with('alert','Mật khẩu không chính xác!');
            }
        }else {
            return redirect(route('login'))->with('alert','Email không chính xác!');
        }
    }

    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->id)->first();
            if($isUser){  
                Auth::login($isUser);
                $session = $isUser->toArray();
                session()->put($session);
                return redirect(route('home'));
            }else{

                $url = $user->avatar;
                $contents = file_get_contents($url);
                $name = $user->id . '.png';
                $save = 'avatars/' . $user->id . '.png';
                Storage::put($name, $contents);

                $createUser = User::create([
                    'fullname' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'avatar' => $name,
                    'password' => bcrypt('123456')
                ]);
                
                Auth::login($createUser);
                $session = $createUser->toArray();
                session()->put($session);
                return redirect(route('home'));
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect(route('home'));
    }

    public function registration()
    {
        return view('login.registration');
    }

    public function postRegistration(RegistrationRequest $request)
    {
        $validated = $request->validated();
        // var_dump($request->recaptcha);die;
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
            'email' => $request->email,
            'avatar' => $fullpath,
            'password' => bcrypt($request->password)
        ]);

        Auth::login($createUser);
        $session = $createUser->toArray();
        session()->put($session);
        return redirect(route('home'));
    }

    public function forget()
    {
        return view('login.forget');
    }

    public function postForget(Request $request)
    {
        $data = User::where('email', $request->email)->first()->toArray();
        if($data){
            try {
                $data['password'] =  Str::random(10);
                User::find($data['id'])->update(['password'=> Hash::make($data['password'])]);

                Mail::send('login.sendEmail',$data ,function($mail) use($data, $request){
                    $mail->from('abc2012199@gmail.com', 'Support');
                    $mail->to('abc2012199@gmail.com', $data['fullname'])->subject('Forget Pass');
                });

                return redirect()->back()->with('alert_success', 'Mật khẩu mới đã được gửi vào email của bạn!');
            } catch (\Throwable $th) {
                throw $th;
            }
        }else{
            return redirect()->back()->with('alert', 'Không tìm thấy địa chỉ email hợp lệ!');
        }
    }
}
