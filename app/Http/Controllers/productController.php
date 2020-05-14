<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\repositories\Product_repository_controller;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $finalized_array = array();
        $prod_data = array(
            "artist_title" => json_decode(json_encode($request->artist_title)),
            "year" => $request->year,
        //     "tracklist" => json_decode(json_encode($request->tracklist)),
        //     "videos" => json_decode(json_encode($request->videos)),
        //     "format" => json_decode(json_encode($request->format)),
        //     "style" => json_decode(json_encode($request->style)),
        //     "catno" => json_decode(json_encode($request->catno)),
            "images" => json_decode(json_encode($request->images)),
            // "thumbnail_image" => json_decode(json_encode($request->thumbnail_image)),
        //     "artists" => json_decode(json_encode($request->artists)),
        //     "engineers" => json_decode(json_encode($request->engineers)),
        //     "sku" => json_decode(json_encode($request->sku)),
        //     "category_code" => json_decode(json_encode($request->category_code)),
        //     "condition_code" => json_decode(json_encode($request->condition_code)),
            "price" => $request->price,
            'interp_cond_sleeve' => $request->interp_cond_sleeve,
            'interp_cond_media' => $request->interp_cond_media,
            'media_format' => $request->media_format,
            'primary_condition' => $request->primary_condition,
            'product_category' => $request->woocommerce_category_code,
            'artist' => $request->artist,
            'year' => $request->year,
            'style' => $request->style,
            'label' => $request->label,
            'woocomm_prod_desc' => $request->woocomm_prod_desc,
            'discogs_release_id' => $request->discogs_release_id,
            'location' => $request->location,
            'comments' => $request->comments,
            'discogs_comments' => $request->discogs_comments,
            'sku' => $request->sku,
            'catno' => $request->catno,
            'shipping_class' => $request->shipping_class,
            'list_destination_code' => $request->list_destination_code,
            'euro_price' => $request->euro_price

            // "short_remark" => json_decode(json_encode($request->short_remark))
        );

        // $woocommerce = app()->make('woocomm_obj');
        // $a = $woocommerce->get('products/attributes');


        $rep = new Product_repository_controller($prod_data);
        $rep->create_all_types();

        // $a = json_decode(json_encode($request->tracklist));
        // ass($prod_data['images'])

        // return response(assemble_image($prod_data['images']));




        return response()->json([
            // 'artist' => $prod_data['artist'],
            'year' => $prod_data['year'],
            // 'style' => $prod_data['style'],
            // 'label' => $prod_data['label'],
            'a' => ''
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
