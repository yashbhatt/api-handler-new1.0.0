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
            $table->string('artist_title')->nullable();
            $table->string('catno')->nullable();
            $table->string('year')->nullable();
            $table->string('media_format')->nullable();
            $table->string('primary_condition')->nullable();
            $table->string('media_condition')->nullable();
            $table->string('sleeve_condition')->nullable();
            $table->string('label')->nullable();
            $table->string('price')->nullable();
            $table->string('category')->nullable();
            $table->string('sku')->nullable();
            $table->string('woocommerce_product_id')->nullable();
            $table->string('discogs_product_id')->nullable();
            $table->string('discogs_listings')->nullable();
            $table->longtext('product_description')->nullable();
            $table->string('discogs_release_id')->nullable();
            $table->string('location')->nullable();
            $table->string('comments')->nullable();
            $table->string('discogs_comment')->nullable();
            $table->string('shipping_class')->nullable();

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
