<?php

namespace App\Http\Controllers;

use App\Models\cat;
use App\Models\order;
use App\Models\product;
use App\Models\address;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cats = cat::with('product')->get();
        return view('home', compact('cats'));
    }


    public function show()
    {
        if (request('cat') && ctype_digit(request('cat'))) {
            $cat = request('cat');
            $cats = cat::with('product')->get();
            $catss = cat::with('product')->find($cat);
            return view('home-showcat', compact(['cats', "catss"]));
            dd($cats);
        } else {
            $cats = cat::with('product')->get();
            return view('home', compact('cats'));
        }
    }


    public function seemore($id)
    {
        if (is_numeric($id)) {
            $product = product::findOrFail($id);
            $cats = cat::all();
            $cati = cat::find($product->catId);
            return view('seemore', compact(['cats', 'product', 'cati']));
        } else {
            return redirect()->route('home');
        }

    }


    public function ajaxadd2cart()
    {

        if (is_numeric(\request('add2cart'))) {
            $productId = request('add2cart');
            $prodact = product::findOrFail($productId);
            if (session()->has('cart')) {
                session()->push('cart', $productId);
            } else {
                session(['cart' => []]);
                session()->push('cart', $productId);
            }
            return count(session('cart'));
        } else {
            return "This data is not supported ";
        }
    }


    public function shoppingcart()
    {

        if (session()->has('cart')) {
            $cart = session()->get('cart');
            $products = [];
            foreach ($cart as $item) {
                $products[] = product::find($item);
            }
        } else {
            $products = [];
        }
        $cats = cat::all();

        if (auth()->user()) {
            $userid = auth()->user()->id;
            $oldorders = order::where('userId', $userid)->get();
        }
        return view('shoppingcart', compact(['products', 'cats']));


    }


    public function deletefromcart($id)
    {
        if (is_numeric($id)) {
            if (in_array($id, session('cart'))) {
                foreach (session('cart') as $key => $value) {
                    if ($value == $id) {
                        $a = \session('cart');
                        unset($a[$key]);
                        session(['cart' => $a]);
                        return redirect()->route('cart');
                    }
                }
            }
            dd(session('cart'));
        } else {
            return redirect()->route('home');
        }
    }


    public function acceptbuy()
    {
        if (\session('cart') > 0) {
            if (auth()->user()->hasVerifiedEmail()) {
                $cats = cat::all();
                $cart = \session('cart');
                foreach ($cart as $item) {
                    $products[] = product::findOrFail($item);
                }
                $userid = auth()->user()->id;
                $user = user::find($userid);
                $user = $user->name;
                $c = address::where('userid', $userid)->get();
                if (count($c) > 0) {
                    $addresses = $c;
                } else {
                    $addresses = 'not found';
                }

                return view('accept', compact(['cats', 'products', 'addresses', 'user']));
            } else {
                return view('auth.verify');
            }
        } else {
            return abort(404);
        }
    }


    public function addaddress()
    {
        return view('addadress');
    }


    public function storeaddress()
    {
        $this->validate(request(),[
            'province' => 'required',
            'district' => 'required' ,
              'address' => 'required' ,
              'zipCode' => 'required|min:6',
              'number' => 'required|min:11',
        ]);
        $res=address::create([
            'userId' => auth()->user()->id,
            'province' => request('province'),
            'zipcode' => request('zipCode'),
            'city' => request('district'),
            'adress' => request('address'),
            'number' => request('number'),
        ]);
        if ($res){
            return redirect()->route('acceptbuy');
        }else{
            return redirect()->back()->with(['info'=>'bir Sorun var. kaydedilemedi . lütfen bır daha deneyin ','status','no']);
        }
    }


    public function finishbuy()
    {
        $adresId = request('successadress');
        $cart = \session('cart');
        foreach ($cart as $item) {
            $products[] = product::findOrFail($item);
        }
        $user = auth()->user()->id;
        $c = address::where('id', $adresId)->where('userId', $user)->get();
        if (count($c) > 0) {
            $addresses = $c;
        } else {
            $addresses = 'not found';
        }
        $cats = cat::all();
        \session()->put('buy', $adresId);
        return view('finishbuy', compact(['cats', 'products', 'user', 'addresses']));
    }


    public function finishbuyget()
    {
        if (\session('cart') > 0) {
            $cart = \session('cart');
            $prices = 0;
            foreach ($cart as $item) {
                $products[] = $i = product::findOrFail($item);
                $prices += $i->price;
            }
            $adressId = session('buy');
            $adress = address::find($adressId);
            $productsId = json_encode($cart);
            $sql = order::create([
                'userId' => auth()->user()->id,
                'productsId' => $productsId,
                'totalprice' => $prices,
                'adressId' => $adressId,
                'adress' => json_encode($adress),
//                'adress' => $adress,
            ]);

            if ($sql) {
                \session()->pull('cart');
                \session()->pull('buy');
                return $this->shoppingcart()->with(['status' => 'Siparişiniz kaydedildi', 'color' => 'success']);
            } else {
                return $this->shoppingcart()->with(['status' => 'Bir sorun oldu , lütfen tekrar deneyin', 'color' => 'danger']);
            }
        } else {
            return abort(404);
        }
    }


    public function userdashbord()
    {
        $products = [];
        $userId = auth()->user()->id;
        $orders = order::where('userId', $userId)->get()->toArray();
        foreach ($orders as $order) {
            $picid = json_decode($order['productsId']);
            $p = [];
            foreach ($picid as $pic) {
                $p = array_merge($p, product::where('id', $pic)->pluck('imgpath')->toArray());
            }
            $products[] = $p;
        }
        $cats = cat::all();
        return view('dashbord', compact('cats', 'orders', 'products'));

        /*
                $products=[];
                $userId=auth()->user()->id;
                $orders=order::where('userId',$userId)->get()->toArray();
                foreach ($orders as $order){
                    $picid=json_decode($order['productsId']);
                    $products[] = product::find($picid)->pluck('imgpath')->toArray();
                }
                $cats = cat::all();
                return view('dashbord', compact('cats','orders','products'));
        */

    }






}


/*
 * for search
 where product_keywords like N'%$search_qurey%
 */
