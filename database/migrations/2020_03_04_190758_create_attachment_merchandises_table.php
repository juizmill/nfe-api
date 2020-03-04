<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentMerchandisesTable extends Migration
{
    public function up()
    {
        Schema::create('attachment_merchandises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cest');
            $table->integer('ncm');
            $table->string('item', 10);
            $table->longText('description');
            if (config('app.env') === 'testing') {
                //Arrumando Bug do SqlIte
                $table->unsignedBigInteger('goods_segments_id')->default('');
            } else {
                $table->unsignedBigInteger('goods_segments_id');
            }

            $table->foreign('goods_segments_id')
            ->references('id')
            ->on('goods_segments')
            ->onDelete('cascade');


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attachment_merchandises');
    }
}
