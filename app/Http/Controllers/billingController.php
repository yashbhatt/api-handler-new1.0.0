<?php

namespace App\Http\Controllers;

use App\customer;
use App\product;
use Illuminate\Http\Request;

class billingController extends Controller
{
    public function reterieve_lp ($prod_sku) {
        $a = product::where('sku' , $prod_sku)->first();
        $obj = array(
            'artist_title' => $a->artist_title,
            'price' => $a->price,
            'sku' => $a->sku,
            'woocommerce_product_id' => $a->woocommerce_product_id,
            'discogs_product_id' => $a->discogs_product_id,
        );
        return json_encode($obj);
    }

    public function reterieve_customers ($cust_name) {
        // print_r($request->input('cust_name'));
    }

    public function add_customers (Request $request) {
        $customer = new customer;
        $customer->cust_name = $request->cust_name;
        $customer->cust_email = $request->cust_email;
        $customer->phone = $request->cust_phone;
        $customer->cust_state_code = $request->cust_state_code;
        $customer->cust_address = $request->cust_address;
        $customer->save();
    }
}
