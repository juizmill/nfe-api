<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCfopTablesTable extends Migration
{
    public function up()
    {
        Schema::create('cfop_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('cfop');
            $table->enum('origin', ['Mesmo estado', 'Outro estado']);
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cfop_tables');
    }
}
