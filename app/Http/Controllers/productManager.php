<?php

namespace App\Http\Controllers;

use App\barcodes;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class productManager extends Controller
{

    public $woocommerce;
    public function __construct()
    {
        $this->woocommerce = app()->make('woocomm_obj');
    }

    public function product_search ($prod_identifier) {
            $name_res = product::where('artist_title', 'LIKE',"%".$prod_identifier."%")->orWhere('sku', 'LIKE', "".$prod_identifier."")->get();
            return $name_res;
    }


    public function sync_del ($prod_sku) {
        $a = product::where('sku','=',$prod_sku)->first();
        if($a->discogs_product_id) {
            // return $a->discogs_product_id;
            Http::delete('https://api.discogs.com/marketplace/listings/'.$a->discogs_product_id. '?' . app()->make('discogs_auth_bit'));
            // return 'https://api.discogs.com/marketplace/listings/'.$a->discogs_product_id;
        }
        if ($a->woocommerce_product_id != 0) {
            $this->woocommerce->delete('products/'.$a->woocommerce_product_id,['force' =>true]);
            // return $a;
        }

        $barcode = barcodes::where('barcode' , '=' , $a->sku);
        $barcode->delete();

        $a->delete($a->id);
        // return product::onlyTrashed()->get();
    }

}
