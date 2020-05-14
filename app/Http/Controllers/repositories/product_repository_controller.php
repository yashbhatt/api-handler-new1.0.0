<?php

namespace App\Http\Controllers\repositories;

use App\Http\Controllers\Controller;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Product_repository_controller extends Controller
{

    public $prod_data;
    public $image_array;
    public $finalized_array;
    public $woocommerce_return_value;
    public $discogs_response;
    public $woocommerce;

    public function __construct($prod_data)
    {
        $this->prod_data = $prod_data;
        $this->woocommerce = app()->make('woocomm_obj');
        // $this->image_array =
        // the request is coming straight to here
    }


    public function create_all_types () {
        switch ($this->prod_data['list_destination_code'][0]) {
            case '1':
                $this->create_woocommerce_product();
                break;

            case '0':

                break;
            default:

                break;
        }
        switch ($this->prod_data['list_destination_code'][1]) {
            case '1':
                $this->create_discogs_product();
                $this->create_product();
                break;

            case '0':
                $this->create_product();
                break;

            default:

                break;
        }


        // $this->assemble_image($this->prod_data['images']);
        // $this->create_woocommerce_product();
        // $this->create_discogs_product();
        // $this->create_product();
    }

    public function create_product () {
        $product = product::create();
        $product->artist_title = $this->prod_data['artist_title'];
        $product->catno = $this->prod_data['catno'];
        $product->year = $this->prod_data['year'];
        $product->media_format = $this->prod_data['media_format'];
        $product->primary_condition = $this->prod_data['primary_condition'];
        $product->media_condition = $this->prod_data['interp_cond_media'];
        $product->sleeve_condition = $this->prod_data['interp_cond_sleeve'];
        $product->label = $this->prod_data['label'];
        $product->price = $this->prod_data['price'];
        $product->category = $this->prod_data['product_category'];
        $product->sku = $this->prod_data['sku'];
        $product->product_description = $this->prod_data['woocomm_prod_desc'];

        $product->discogs_comment = $this->prod_data['discogs_comments'];

        $product->discogs_product_id = $this->discogs_response['listing_id'];
        $product->discogs_release_id = $this->prod_data['discogs_release_id'];
        $product->location = $this->prod_data['location'];
        $product->comments = $this->prod_data['comments'];
        $product->shipping_class = $this->prod_data['shipping_class'];
        $product->euro_price = $this->prod_data['euro_price'];

        if (!$this->woocommerce_return_value) {
            $product->woocommerce_product_id = 0;
        } else {
            $product->woocommerce_product_id = $this->woocommerce_return_value->id;
        }

        // $product-> = $this->woocommerce_return_value->id;
        $product->save();
    }


        function assemble_image ($images) {
            $ak = [];
            for ($i = 0; $i < sizeof($images); $i++) {
                // $ak->array_push(array('uri' => $images[$i]));
                array_push($ak, array(
                    'src' => $images[$i]->uri,
                    'postition' => $i,
                    "name" => $this->prod_data['artist_title'],
                    "alt" => strval($this->prod_data['artist_title'])
                ));
            }
            return $ak;
        }

    public function create_woocommerce_product () {

        // makes woocommerce product

        // $this->assemble_image($this->prod_data);
        // $struct_generator = app()->make("struct_generator");
        // $returned_obj = $struct_generator->make_woocommerce_structured_product();


        $assoc_image_arr = $this->assemble_image ($this->prod_data['images']);

        $prod_data = [
            'name' => $this->prod_data['artist_title'],
            'manage_stock' => true,
            'stock_quantity' => 1,
            'type' => 'simple',
            'sku' => strval($this->prod_data['sku']),
            'regular_price' =>  strval($this->prod_data['price']),
            'description' => $this->prod_data['woocomm_prod_desc'],
            'categories' => [
                [
                    'id' => $this->prod_data['product_category']
                    ]
                ],
            'reviews_allowed' => false,
            'shipping_class'=> $this->prod_data['shipping_class'],
            'images' => $assoc_image_arr,
            'attributes' => [
                [
                    'id' => 4,
                    'position' => 0,
                    'visible' => true,
                    'variation' => false,
                    'options' => [
                        $this->prod_data['media_format']
                    ]
                ],
                [
                    'id' => 5,
                    'position' => 1,
                    'visible' => true,
                    'variation' => false,
                    'options' => [
                        $this->prod_data['primary_condition']
                    ]
                ],
                [
                    'id' => 6,
                    'position' => 2,
                    'visible' => true,
                    'variation' => false,
                    'options' => [
                        $this->prod_data['interp_cond_media']
                    ]
                ],
                [
                    'id' => 7,
                    'position' => 3,
                    'visible' => true,
                    'variation' => false,
                    'options' => [
                        $this->prod_data['interp_cond_sleeve']
                    ]
                ],
                [
                    'id' => 8,
                    'position' => 4,
                    'visible' => true,
                    'variation' => false,
                    'options' => [
                        $this->prod_data['artist']
                    ]
                ],
                [
                    'id' => 9,
                    'position' => 5,
                    'visible' => true,
                    'variation' => false,
                    'options' => [
                        $this->prod_data['label']
                    ]
                ],
                [
                    'id' => 10,
                    'position' => 6,
                    'visible' => true,
                    'variation' => false,
                    'options' => $this->prod_data['style']
                ],
                [
                    'id' => 11,
                    'position' => 7,
                    'visible' => true,
                    'variation' => false,
                    'options' => [
                        strval($this->prod_data['year'])
                    ]
                ],


            ],


            // [
            //     [
            //         'src'      => $this->prod_data['images'][0]->uri,
            //         'position' => 0,
            //     ]
            // ]
        ];

        // 15

        // $prod_data_alt = [
        //     'name'          => $this->req->artist_title,
        //     'type'          => 'simple',
        //     'regular_price' => '1000',
        //     'description'   => $this->req->short_remark,
        //     'images'        => [
        //         [
        //             'src'      => $this->req->images[0]->uri,
        //             'position' => 0,
        //         ],
        //     ],
        //     'categories'    => [
        //         // [
        //         //     'id' => 1,
        //         // ],
        //     ],
        // ];



        // error_log($this->image_array);
        // dd($prod_data_alt);
        // return response()->json(['context' => $prod_data_alt]);

        $this->woocommerce_return_value = $this->woocommerce->post('products', $prod_data);
    }

    public function create_discogs_product () {
        $this->discogs_response = Http::post(app()->make('discogs_product_url'),[
            'release_id' => $this->prod_data['discogs_release_id'],
            'condition'=> $this->prod_data['interp_cond_media'],
            'sleeve_condition' => $this->prod_data['interp_cond_sleeve'],
            // take europian price here
            'price' => $this->prod_data['euro_price'],
            'comments' => $this->prod_data['discogs_comments'],
            'status' => "For Sale",
            'location' => $this->prod_data['location']
        ]);
    }




}
