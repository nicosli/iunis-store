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
            $table->increments('id');
            
            $table->string('name');
            $table->string('description');
            $table->string('barcode')->unique();
            $table->decimal('price', 10, 2);
            $table->decimal('public_price', 10,2);
            $table->integer('stock');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('providers');             
            $table->unsignedInteger('variant_id');
            $table->foreign('variant_id')->references('id')->on('variants');

            $table->index(['category_id', 'provider_id', 'variant_id']);

            $table->timestamps();
            $table->softDeletes();
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
