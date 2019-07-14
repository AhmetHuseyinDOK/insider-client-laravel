<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product/{id}',function(){
    return view('product',['id' => request()->id]);
});

Route::post('/coupon',function(){
    
    return [
        "customer_id" => request()->customer_id,
        "product_id" => request()->product_id,
        "code"=> request()->customer_id."DIS20TL",
        "direct"=>20,
        "expires"=>"2019-07-14 23:00:00"
    ];
});

Route::get('/user',function(){
    if(auth()->id()){
        return response()->json([
            "id"=>auth()->id()
        ]);
    }
    return response()->json([]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
