<?php

namespace App\Providers;

$autoloader = dirname( __FILE__ ) . '/vendor/autoload.php';
if ( is_readable( $autoloader ) ) {
	require_once $autoloader;
}

use Illuminate\Support\ServiceProvider;
use Automattic\WooCommerce\Client;
use App\Http\Controllers\woocomm_part\woocomm_product_structure_generator;
use Illuminate\Support\Facades\Http;

class woocommServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind("woocomm_obj",function () {
            $woocommerce = new Client(
                'http://projectanalogue.in/',
                'ck_25bffb4ef898de8b39d36d60f44ae751b93dc1a1',
                'cs_598de40c9dd9345c36f751124fafec3f9b85614f',
                [
                    'wp_api'  => true,
                    'version' => 'wc/v2',
                ]
            );
            return $woocommerce;
        });

        app()->bind('struct_generator',function ($request) {
            // return new woocomm_product_structure_generator($request);
        });

        app()->bind('discogs_product_url',function () {
            return "https://api.discogs.com/marketplace/listings?token=OwoOpeVGEzjlYdYWSYjTvLzsjJLzYqLWryqgFWtX";
        });

        app()->bind('discogs_order_endpoint', function () {
            return "https://api.discogs.com/marketplace/orders?token=OwoOpeVGEzjlYdYWSYjTvLzsjJLzYqLWryqgFWtX";
        });

        app()->bind('discogs_auth_bit', function () {
            return "token=OwoOpeVGEzjlYdYWSYjTvLzsjJLzYqLWryqgFWtX";
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
