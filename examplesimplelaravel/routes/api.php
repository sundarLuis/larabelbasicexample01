<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Product;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', function(){

    return Product::all();
});
Route::get('/product/{id}',function ($id){
    $idParseInt = intval($id);
    return Product::find($idParseInt);
});
Route::post('/product',function(Request $request){

    //$refParam = $request->query('test');
    $name = $request->input('name');
    $detail = $request->input('detail');
    if (!empty($name) || !empty($detail)){
        $product = new Product;
        $product->name = $name;
        $product->datail = $detail;
        $product->save();
        return response()->json([
            "response"=>"save successful"
        ]);
    }else{
        return response()->json([
            "response"=>"empty data is required"
        ]);
    }
});