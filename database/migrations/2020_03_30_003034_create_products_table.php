<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('artist_title')->default(0)->nullable();
            $table->string('catno')->default(0)->nullable();
            $table->string('year')->default(0)->nullable();
            $table->string('media_format')->default(0)->nullable();
            $table->string('primary_condition')->default(0)->nullable();
            $table->string('media_condition')->default(0)->nullable();
            $table->string('sleeve_condition')->default(0)->nullable();
            $table->string('label')->default(0)->nullable();
            $table->string('price')->default(0)->nullable();
            $table->string('category')->default(0)->nullable();
            $table->string('sku')->default(0)->nullable();
            $table->string('woocommerce_product_id')->default(0)->nullable();
            $table->string('discogs_product_id')->default(0)->nullable();
            $table->string('discogs_listings')->default(0)->nullable();
            $table->longtext('product_description')->default(0)->nullable();
            $table->string('discogs_release_id')->default(0)->nullable();
            $table->string('location')->default(0)->nullable();
            $table->string('comments')->default(0)->nullable();
            $table->string('discogs_comment')->default(0)->nullable();
            $table->string('shipping_class')->default(0)->nullable();


            // $table->text('tracklist')->default(0)->nullable();
            // $table->text('videos')->default(0)->nullable();
            // $table->text('format')->default(0)->nullable();
            // $table->text('style')->default(0)->nullable();
            // $table->string('catno')->default(0)->nullable();
            // $table->text('images')->default(0)->nullable();
            // $table->text('thumbnail_image')->default(0)->nullable();
            // $table->text('artists')->default(0)->nullable();
            // $table->text('engineers')->default(0)->nullable();
            // $table->string('category_code')->default(0)->nullable();
            // $table->string('condition_code')->default(0)->nullable();
            // $table->float('price')->default(0)->nullable();
            // $table->text('short_remark')->default(0)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
