<?php

namespace App\Http\Controllers;

use App\barcodes;
use Illuminate\Http\Request;

class barcodeController extends Controller
{
    public function check_barcodes ($barcode) {
        // $barcode_array = $request->input('barcodes');
        // foreach ($barcode_array as $key => $value) {

        // first we need to chech if ther is a barcode in the
            $a = barcodes::where('barcode' ,intval($barcode))->first();
            if ($a) {
                return response()->json('exists');
            } else {
                return response()->json('vacant');
            }
    }

    // public function find_matching_barcodes ($barcode) {
    //     $a = barcodes::where('barcode', $barcode)->first();
    //     if ($a) {
    //         return 1;
    //     } else {
    //         return 0 ;
    //     }
    // }

    public function add_barcodes ($barcode) {
        $b_code = new barcodes();
        $b_code->barcode = intval($barcode);
        $b_code->save();
    }
}
