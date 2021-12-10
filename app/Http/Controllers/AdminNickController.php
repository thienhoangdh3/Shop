<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nick;
use App\Models\Server;
use App\Models\ClassAcc;
use Symfony\Component\HttpFoundation\Response; 
use Illuminate\Support\Facades\Storage;

class AdminNickController extends Controller
{
    public function sql()
    {
        $class = ClassAcc::all();
        $sv    = Server::all();
        return [$class, $sv]; 
    }

    public function index(Request $request)
    {
        list($class, $sv) = $this->sql();
        if(isset($_GET['query'])){
            is_numeric($request->servers)   ? $servers   = $request->servers    :  $servers   = "";
            is_numeric($request->class_acc) ? $class_acc = $request->class_acc  :  $class_acc = "";
            is_numeric($request->ttgt)      ? $ttgt      = $request->ttgt       :  $ttgt      = "";
            is_numeric($request->status)    ? $status    = $request->status     :  $status    = "";
            $search = $_GET['query'];
            $datas = Nick::where([
                                ['sv_id',    'LIKE', '%'.$servers.'%'],
                                ['class_id', 'LIKE', '%'.$class_acc.'%'],
                                ['clan',     'LIKE', '%'.$ttgt.'%'],
                                ['status',   'LIKE', '%'.$status.'%'],
                                ['level',    'LIKE', '%'.$search.'%']
                                ])
                        ->orWhere([
                                ['id',       'LIKE', '%'.$search.'%'],
                                ['price',    'LIKE', '%'.$search.'%'],
                                ['notes',    'LIKE', '%'.$search.'%'],
                                ['username', 'LIKE', '%'.$search.'%']
                        ])
                        ->paginate(5);
            return view('profile_admin.nick.list')->with(compact('datas', 'sv', 'class'));
        }
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
          
        $request->ttgt == 'on' ? $request->ttgt = '1' : $request->ttgt = '0';

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
            'status'   => '1' ,
        ]);

        return redirect()->back()->with('alert_success', 'Thêm nick thành công!');
    }

    public function view($id)
    {
        $data = Nick::where('id', $id)->with('nick_class:id,class')
                                      ->with('nick_sv:id,sv_name')->first();
        return response()->json($data, Response::HTTP_OK);
    }

    public function edit($id)
    {
        $data = Nick::find($id);
        list($class, $sv) = $this->sql();
        return view('profile_admin.nick.edit')->with(compact('data', 'class', 'sv'));
    }

    public function update(Request $request, $id)
    {
        $nick = Nick::find($id);
        $request->ttgt == 'on' ? $request->ttgt = '1' : $request->ttgt = '0';
        $result = Nick::where('id', $id)
                    ->update([
                        'ingame' => $request->ingame,
                        'price' => $request->price,
                        'clan' => $request->ttgt,
                        'level' => $request->level,
                        'class_id' => $request->class_acc,
                        'sv_id' => $request->server_acc,
                        'notes' => $request->notes,
                        'username' => $request->username,
                        'password' => $request->password,
                        'status' => $request->status,
                    ]);
        
        $files = [];
        $i = 0;
        if($request->hasfile('images'))
        {
            $img = json_decode($nick->images, true);
            foreach($img as $img)
            {
                $destination = "/nick/".$img;
                Storage::delete($destination); 
            }
            
            foreach($request->file('images') as $file)
            {
                $name = $request->ingame.$i++.'.'.$file->extension();
                $file->storeAs('nick', $name);  
                $files[] = $name;  
            }
            Nick::where('id', $id)->update(['images' => json_encode($files)]);
        }
        return redirect()->back()->with('alert_success', 'Sửa Thông Tin Thành Công!');
    }

    public function delete($id)
    {
        $nick =  Nick::find($id);
        $img = json_decode($nick->images, true);
        foreach($img as $img)
        {
            $destination = "/nick/".$img;
            Storage::delete($destination); 
        }
        Nick::destroy($id);

        return response()->json($nick->ingame, Response::HTTP_OK);
    }
}
