<?php

namespace App\Http\Controllers;

use App\Models\cat;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class search extends Controller
{
    public function index(){

        $ser=\request('text');

//dd($ser);
        if ($ser!=null and $ser!="") {
            $search=explode(' ',trim($ser));
            foreach ($search as $key=>$item){
                if ( $key == 0) {
                    $user=product::where('name','LIKE',"%{$search[$key]}%")->orWhere('title','LIKE',"%{$search[$key]}%");
                }else{
                    $user=$user->where('name','LIKE',"%{$search[$key]}%")->orWhere('title','LIKE',"%{$search[$key]}%");
                }
            }
            $search=$user->with('cat')->get();
            $cats=cat::all();
//            dd($que);
            return view('home',compact('cats','search','ser'));
        }else{
            $cats=cat::with('product')->get();
            return view('home',compact('cats'));
        }

    }

}// payan kelas

/*
 /////////////search/////////////
    $('#search').keyup(function () {
        searchval = $('#search').attr("value");

        $.get("/search", {search: searchval}, function (data, status) {
            // alert (data+' '+status);
            if (status == "success") {
               alert(data);
            } else {
            alert('no');
            }
        });

    });
 //----------------search---------------
 */
