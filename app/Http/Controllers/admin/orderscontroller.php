<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class orderscontroller extends Controller
{
    public function show()
    {
        $orders=order::orderBy('id', 'desc')->paginate(15);
        return view('admin.showorder',compact('orders'));
    }


    public function delete($id)
    {
//        dd($id,request('change'));
        if (ctype_digit($id)){
            if (request('change')=='acc'){
                $find=order::where('id',$id)->update([
                    'status'=>'approval'
                ]);
            }elseif (request('change')=='rej'){
                $find=order::where('id',$id)->update([
                    'status'=>'not approved'
                ]);
            }elseif (request('change')=='not'){
                $find=order::where('id',$id)->update([
                    'status'=>'none'
                ]);
            }
        }else{
            dd('no');
        }
        return redirect()->route('order.show')->withInput();
    }
}
