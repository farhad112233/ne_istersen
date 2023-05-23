<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/admin','App\Http\Controllers\admin\usercontroller@index')->middleware('isadmin')->name('admin.dashbord');
Route::get('/search','App\Http\Controllers\search@index')->name('search');

Route::prefix('/admin/user')->namespace('App\Http\Controllers\admin')->middleware('isadmin')->group(function (){
//    Route::get('/user','usercontroller@index')->name('admin.dashbord');
    Route::get('/','usercontroller@show')->name('users.list');
    Route::get('/create','usercontroller@create')->name('users.create');
    Route::post('/create','usercontroller@store')->name('users.store');
    Route::get('/delete/{id}','usercontroller@destroy')->name('users.destroy');
    Route::get('/edit/{id}','usercontroller@edit')->name('users.edit');
    Route::post('/update/{id}','usercontroller@update')->name('users.update');
});


Route::prefix('admin/cat')->namespace('App\Http\Controllers\admin')->middleware('isadmin')->group(function (){
    Route::get('/','catController@index')->name('cat.show');
    Route::get('/create','catController@create')->name('cat.create');
    Route::post('/store','catController@store')->name('cat.store');
    Route::get('/edit/{id}','catController@edit')->name('cat.edit');
    Route::post('/update/{id}','catController@update')->name('cat.update');
    Route::get('/destroy/{id}','catController@destroy')->name('cat.destroy');
});


Route::prefix('admin/product')->namespace('App\Http\Controllers\admin')->middleware('isadmin')->group(function (){
    Route::get('/','prodactController@index')->name('product.show');
    Route::get('/create','prodactController@create')->name('product.create');
    Route::post('/store','prodactController@store')->name('product.store');
    Route::get('/edit/{id}','prodactController@edit')->name('product.edit');
    Route::post('/update/{id}','prodactController@update')->name('product.update');
    Route::get('/destroy/{id}','prodactController@destroy')->name('product.destroy');
});


Route::prefix('admin/order')->namespace('App\Http\Controllers\admin')->middleware('isadmin')->group(function (){
    Route::get('/','orderscontroller@show')->name('order.show');
    Route::get('/delete/{id?}','orderscontroller@delete')->name('order.delete');
});


Route::prefix('admin/addres')->namespace('App\Http\Controllers\admin')->middleware('isadmin')->group(function (){
    Route::get('/','addresController@show')->name('addres.show');
});


Route::prefix('/')->namespace('App\Http\Controllers')->group(function(){
    Route::get('/','HomeController@show')->name('home');
    Route::get('/home','HomeController@show')->name('homee');
    Route::get('/seemore/{id}','HomeController@seemore')->name('seemore');
    Route::get('/ajax','HomeController@ajaxadd2cart')->name('add2cart');
    Route::get('/shoppingcart','HomeController@shoppingcart')->name('cart');
    Route::get('/deletefromcart/{id}','HomeController@deletefromcart')->name('deletefromcart');
    Route::get('/accept','HomeController@acceptbuy')->name('acceptbuy')->middleware(['auth','verified']);
    Route::get('/addaddress','HomeController@addaddress')->name('addaddress')->middleware('auth');
    Route::post('/addaddress','HomeController@storeaddress')->name('address.add')->middleware('auth');
    Route::post('/finish','HomeController@finishbuy')->name('finishbuy')->middleware('auth');
    Route::get('/finish','HomeController@finishbuyget')->name('finishbuyget')->middleware('auth');
    Route::get('/dashbord','HomeController@userdashbord')->name('user.dashbord')->middleware('auth');
});

//Route::get('/home', [App\Http\Controllers\HomeHomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\Controller::class, 'index'])->name('home');
?>

