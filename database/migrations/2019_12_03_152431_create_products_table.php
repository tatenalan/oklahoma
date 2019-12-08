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
            $table->integer('price');
            $table->boolean('onSale')->default(false); // a prueba
            $table->integer('discount')->nullable();
            $table->bigInteger('genre_id')->nullable()->unsigned();
            $table->bigInteger('category_id')->nullable()->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
