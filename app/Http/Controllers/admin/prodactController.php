<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\cat;
use App\Models\product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class prodactController extends Controller
{

    public function index()
    {
        $products=product::with('cat')->orderBy('id', 'desc')->paginate(15);
        return view('admin.showProducts',compact('products'));
    }


    public function create()
    {
        $cats=cat::all();
        return view("admin.createProduct",compact('cats'));
    }


    public function store(Request $request)
    {
        $con = request()->files->count();
        for($i = 1 ; $i <= $con ; $i++ ){
            $imgpath[] = $name =str_replace([' ',':'],'-',(now()->toDateTimeString().'-'.rand(1,1000000).'.jpg'));
            $file=request()->file('file'.$i);
             $file->storeAs('/public/imgProducts',$name);
            $this->makeProductTemp($file,$name);
        }
        $imgpath = json_encode($imgpath);
        $res = product::create([
            'catId' => request('cat'),
            'name' => request('name'),
            'imgpath' => $imgpath ,
            'number' => request('number'),
            'title' => request('title'),
            'price' => request('price'),
        ]);
        if ($res){
            return redirect()->route('product.show')->with(['info'=>'yapildi','status'=>'ok']);
        }else{
            return back()->withInput()->with(['info'=>'maalesef olmadi','status'=>'no']);
        }
    }


    public function edit(product $prodact,$id)
    {
        $product=product::find($id);
        $cats=cat::all();
        return view('admin.editProduct',compact(['product','cats']));
    }


    public function update(Request $request, product $prodact,$id)
    {
        if ($prod=product::find($id)) {
            $res = $prod->update([
                'catId' => request('cat'),
                'name' => request('name'),
                'number' => request('number'),
                'title' => request('title'),
                'price' => request('price'),
            ]);
        }
        if ($res){
            return redirect()->route('product.show')->with(['info'=>'yapildi','status'=>'ok']);
        }else{
            return back()->withInput()->with(['info'=>'maalesef olmadi','status'=>'no']);
        }
    }


    public function destroy(product $prodact,$id)
    {
        if (ctype_digit($id)){
            $product=product::find($id);
            $files=json_decode($product->imgpath);
            foreach ($files as $file){
                if (file_exists(storage_path('/app/public/imgProducts/').$file)){
                    unlink(storage_path('/app/public/imgProducts/').$file);
                }
                if (file_exists(storage_path('/app/public/imgProductTemp/').$file)){
                    unlink(storage_path('/app/public/imgProductTemp/').$file);
                }
            }
            if ($product){
                $product->delete();
                return redirect(route('product.show'))->with(['info'=>'ürün silindi','status'=>'ok']);
            }else{
                return redirect(route('product.show'))->with(['info'=>'ürün bulunamadı','status'=>'no']);
            }
        }else{
            return redirect(route('product.show'))->with(['info'=>'ürün bulunamadı','status'=>'no']);
        }
    }


    public function makeProductTemp($file,$tname)
    {
        $pat=$file->path();
        $type=$file->getClientMimeType();
        list($w,$h)=getimagesize($pat);
        if ($type=="image/jpeg") {
            $image=imagecreatefromjpeg($pat);
        }elseif ($type=="image/png") {
            $image=imagecreatefrompng($pat);
        }else{
           return back();
        }
        $i=imagecreatetruecolor(300, 300);
        $c=imagecolorallocate($i, 250, 250, 250);
        imagecopyresized($i, $image, 0, 0, 0, 0, 300, 300, $w, $h);
        $adres=storage_path("app\\public\\imgProductTemp\\").$tname;
        if ($type=="image/jpeg") {
            imagejpeg($i, $adres);
        }elseif ($type=="image/png") {
            imagepng($i,$adres);
        }
        imagedestroy($i);
        imagedestroy($image);
    }


}
