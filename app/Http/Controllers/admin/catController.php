<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class catController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = cat::all()->sortBy('sort');
        return view('admin.showcat',compact('cats'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createcat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = cat::create([
            'name'=> request('name'),
            'sort'=> request('number')
        ]);

        if ($res){
            return redirect(route('cat.show'))->with(['info'=>'yapildi','status'=>'ok']);
        }else{
            return redirect(route('cat.show'))->with(['info'=>'yapilmadi','status'=>'no']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = cat::find($id);
        return view('admin.catedit' , compact('cat'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = cat::where('id', $id)->update([
            'name'=>request('name'),
            'sort'=>request('number')
        ]);
        if ($cat){
            return redirect(route('cat.show'))->with(['info'=>'yapildi','status'=>'ok']);
        }else{
            return redirect(route('cat.show'))->with(['info'=>'yapilmadi','status'=>'no']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (ctype_digit($id)){
            $res=cat::find($id);
            if ($res){
                $res->delete();
                return redirect(route('cat.show'))->with(['info'=>'yapildi','status'=>'ok']);
            }else{
                return redirect(route('cat.show'))->with(['info'=>'bulunamadı','status'=>'no']);
            }
        }else{
            return redirect(route('cat.show'))->with(['info'=>'bulunamadı','status'=>'no']);
        }

    }
}
