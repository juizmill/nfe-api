<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsTable extends Migration
{
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('xNome', 60);
            $table->string('IE', 14)->nullable()->default(null);
            $table->string('xEnder', 60);
            $table->string('xMun', 60);
            $table->string('UF', 2);
            $table->string('CPFCNPJ', 14);
            $table->enum('type', ['J', 'F'])->default('J');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transports');
    }
}
