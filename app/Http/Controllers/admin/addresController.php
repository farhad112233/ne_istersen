<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\address;
use Illuminate\Http\Request;

class addresController extends Controller
{
    public function show()
    {
        $address=address::all()->toArray();
        return view('admin.showaddress',compact('address'));
    }
}
