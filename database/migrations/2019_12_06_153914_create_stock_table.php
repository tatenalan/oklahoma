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
            $table->integer("XS")->default(0);
            $table->integer("S")->default(0);
            $table->integer("M")->default(0);
            $table->integer("L")->default(0);
            $table->integer("XL")->default(0);
            $table->integer("T26")->default(0);
            $table->integer("T28")->default(0);
            $table->integer("T30")->default(0);
            $table->integer("T32")->default(0);
            $table->integer("T34")->default(0);
            $table->integer("T36")->default(0);
            $table->integer("T38")->default(0);
            $table->integer("T40")->default(0);
            $table->integer("T42")->default(0);
            $table->integer("T44")->default(0);
            $table->integer("T46")->default(0);
            $table->integer("T48")->default(0);
            $table->integer("T50")->default(0);
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
