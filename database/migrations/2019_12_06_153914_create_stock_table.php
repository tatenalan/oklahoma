<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer("XS")->nullable();
            $table->integer("S")->nullable();
            $table->integer("M")->nullable();
            $table->integer("L")->nullable();
            $table->integer("26")->nullable();
            $table->integer("28")->nullable();
            $table->integer("30")->nullable();
            $table->integer("32")->nullable();
            $table->integer("34")->nullable();
            $table->integer("36")->nullable();
            $table->integer("38")->nullable();
            $table->integer("40")->nullable();
            $table->integer("42")->nullable();
            $table->integer("44")->nullable();
            $table->integer("46")->nullable();
            $table->integer("48")->nullable();
            $table->integer("50")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
