<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\userreq;
use App\Models\address;
use App\Models\cat;
use App\Models\order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{

    public function index()
    {
        $users=User::count();
        $cats=cat::count();
        $products=product::count();
        $orders=order::count();
        $addresses=address::count();
//        dd($users);
        return view('admin.index',compact('users','cats','products','orders','addresses',));
    }


    public function show()
    {
        $users=user::orderBy('id', 'desc')->paginate(15);
        return view('admin.showusers',compact('users'));
    }


    public function create()
    {
        return view('admin.adduser');
    }


    public function store(userreq $req)
    {
        $this->validate(request(),[
            'name'=> 'required|min:3',
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        $res = DB::table('users')->insertOrIgnore([
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>hash::make(request('password')),
            'rol'=>request('roll')
        ]);
        if ($res){
            $user="asti";
            return redirect(route('users.list'))->with(['info'=>'yapildi','status'=>'ok']);
        }else{
            return redirect(route('users.list'))->with(['info'=>'maalesef bir hata oluştu','status'=>'no']);
        }
    }


    public function destroy($id)
    {
        if (ctype_digit($id)){
            $res=user::find($id);
            if ($res){
                $res->delete();
                return redirect()->route('users.list')->with(['info'=>'Kullanıcı silindi','status'=>'ok']);
            }else{
                return redirect(route('users.list'))->with(['info'=>'Kullanıcı bulunamadı','status'=>'no']);
            }
        }else{
            return redirect(route('users.list'))->with(['info'=>'Kullanıcı bulunamadı','status'=>'no']);
        }

    }


    public function edit($id)
    {
        $user=user::find($id);
        return view('admin.edituser',compact('user'));
    }

    public function update($id)
    {
        if (request('password') && trim(request('password'))!==''){
            $res=$this->validate(\request(),[
                'name'=>'required',
                'email'=>'required|email',
                'roll'=>'required',
                'password'=>'required|min:6|max:12'
            ]);

            $aaa=user::where('id',$id)->update([
                'name'=> request('name'),
                'email'=>   request('email'),
                'password'=> hash::make(request('password')),
                'rol'=> request('roll'),
            ]);
        }else{
            $res=$this->validate(\request(),[
                'name'=>'required',
                'email'=>'required|email',
                'roll'=>'required'
            ]);
            $aaa=user::where('id',$id)->update([
                'name'=> request('name'),
                'email'=>   request('email'),
                'rol'=> request('roll'),
            ]);
        }

        if ($aaa){
            return redirect(route('users.list'))->with(['info'=>'yapildi','status'=>'ok']);
        }else{
            return back();
        }
/*
        dd($res);


        $res= DB::table('users')->where('id',$id)->update([
            'name'=>request('name'),
            'email'=>request('email'),
            request('password') !== null ?dd('ok'):dd("no"),
            'password'=>request('password'),
            'rol'=>request('roll')
        ]);
        if ($res){
            return redirect(route('users.list'))->with('info','yapildi');
        }else{
            return back();
        }
*/
    }
    //*********************



}
