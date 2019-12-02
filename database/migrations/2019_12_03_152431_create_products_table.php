<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('category', 50);
            $table->integer('price');
            $table->boolean('onSale');
            $table->integer('discount')->nullable();
            $table->bigInteger('genre_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('category_id')->references('id')->on('categories');
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
