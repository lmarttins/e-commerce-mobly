<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacteristicProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('characteristic_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('characteristic_id')->references('id')->on('characteristics');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characteristic_product');
    }
}
