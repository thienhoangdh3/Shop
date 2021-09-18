<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nick;
use App\Models\Server;
use App\Models\ClassAcc;
use Symfony\Component\HttpFoundation\Response;

class AdminNickController extends Controller
{
    public function sql()
    {
        $class = ClassAcc::all();
        $sv    = Server::all();
        return [$class, $sv];
    }

    public function index()
    {
        list($class, $sv) = $this->sql();
        $datas = Nick::paginate(5);
        return view('profile_admin.nick.list')->with(compact('datas', 'sv', 'class'));
    }

    public function create()
    {
        list($class, $sv) = $this->sql();
        return view('profile_admin.nick.create')->with(compact('sv', 'class'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
          ]);
          
        ($request->ttgt == 'on') ? $request->ttgt = '1' : $request->ttgt = '0';

        $files = [];
        $i = 0;
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $file)
            {
                $name = $request->ingame.$i++.'.'.$file->extension();
                $file->storeAs('nick', $name);  
                $files[] = $name;  
            }
            // var_dump($files);die;
        }else{
            var_dump(false);die;
        }
        // var_dump($request->notes);die;
        Nick::create([
            'ingame' => $request->ingame,
            'price' => $request->price,
            'clan' => $request->ttgt,
            'level' => $request->level,
            'class_id' => $request->class_acc,
            'sv_id' => $request->server_acc,
            'images' => json_encode($files),
            'notes' => $request->notes,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect()->back()->with('alert_success', 'Thêm nick thành công!');
    }

    public function view($id)
    {
        $data = Nick::where('id', $id)->with('nick_class:id,class')
                                      ->with('nick_sv:id,sv_name')->first();
        return response()->json($data, Response::HTTP_OK);
    }

    public function search($sv, $cls, $ttgt, $status)
    {
        // if (Server::where('id', '=', $sv)->count() == 0) {
        //     $sv = "1";
        // }
        // if (ClassAcc::where('id', '=', $cls)->count() == 0) {
        //     $cls = "";
        // }
        if (Nick::where('clan', '=', $ttgt)->count() == 0) {
            $ttgt = "";
        }
        // if (Nick::where('id', '=', $status)->count() == 0) {
        //     $status = "";
        // }
        $data = Nick::where('clan', 'LIKE', '%'.$ttgt.'%')
                    // ->orWhere('class_id', 'LIKE', '%'.$cls.'%')
                    // ->orWhere('sv_id', 'LIKE', '%'.$sv.'%')
                    // ->orWhere('status', 'LIKE', '%'.$status.'%')
                    ->get();
        // $data = $sv.$cls.$ttgt.$status;
        return response()->json($ttgt, Response::HTTP_OK);
    }
}