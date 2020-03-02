<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('placa', 7);
            $table->string('UF', 2);
            $table->string('RNTC', 20);
            $table->boolean('reboque')->default(false);
            if (config('app.env') === 'testing') {
                //Arrumando Bug do SqlIte
                $table->unsignedBigInteger('user_id')->default('');
                $table->unsignedBigInteger('transport_id')->default('');
            } else {
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('transport_id');
            }

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('transport_id')
                ->references('id')
                ->on('transports')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
