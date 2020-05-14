<?php

use Illuminate\Support\Facades\Route;
use Automattic\WooCommerce\Client;

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

// $prod_data = [
// 	'name'          => 'A great product',
// 	'type'          => 'simple',
// 	'regular_price' => '15.00',
// 	'description'   => 'A very meaningful product description',
// ];

// $woocommerce = app()->make('woocomm_obj');
// $woocommerce->post('products',$prod_data);
Route::post('add_product', function () {
    return view("memez");
});


