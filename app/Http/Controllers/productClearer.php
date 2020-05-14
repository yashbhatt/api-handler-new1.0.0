<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class productClearer extends Controller
{

    public $woocommerce;

    public function __construct()
    {
        $this->discogs_orders = Http::get(app()->make('discogs_order_endpoint'));
    }

    public function sweep_init () {
    //     while (true) {
    //         // check to see if there are any orders in woo aor dscgs
    //     Http::get($this->woocommerce = app()->make('woocomm_obj'));
    //     }
    // sleep(300);

    //this function once started never returns
    }

}
