<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsSegmentsTable extends Migration
{
    public function up()
    {
        Schema::create('goods_segments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('goods_segments');
    }
}
