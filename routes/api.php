<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('add_product', "productController@store");
Route::get('discogs_orders',"productClearer@sweep_init");
route::get('products/{prod_sku}',['uses' =>"billingController@reterieve_lp"]);
route::get('customers/{cust_name}',['uses' =>"billingController@reterieve_customers"]);
route::post('customers', "billingController@add_customers");



route::post('barcodes/{barcode}', ['uses'=>"barcodeController@add_barcodes"]);
route::get('barcodes/{barcode}', ['uses' => "barcodeController@check_barcodes"]);

// product management bit
route::get('manage_products/{prod_identifier}',['uses' => 'productManager@product_search']);
route::delete('manage_products/{prod_sku}',['uses' => 'productManager@sync_del']);

route::get('memes', function () {
    return 'hello from the server sideeeee';
});
