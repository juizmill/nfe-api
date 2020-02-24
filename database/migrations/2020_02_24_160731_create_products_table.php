<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item')->default(1);
            $table->string('cProd', 60);
            $table->string('cEAN', 14)->nullable()->default(null);
            $table->string('xProd', 120)->nullable()->default(null);
            $table->string('NCM', 8)->default(00);

            $table->string('cBenef')->nullable()->default(null);

            $table->string('EXTIPI', 3)->nullable()->default(null);
            $table->string('CFOP', 4);
            $table->string('uCom', 6);
            $table->string('qCom', 4);
            $table->decimal('vUnCom',  13, 2);
            $table->decimal('vProd', 13, 2);
            $table->string('cEANTrib', 14)->nullable()->default(null);
            $table->string('uTrib', 6)->nullable()->default(null);
            $table->integer('qTrib')->nullable()->default(null);
            $table->decimal('vUnTrib', 13, 2)->nullable()->default(null);
            $table->decimal('vFrete', 13, 2)->nullable()->default(null);
            $table->decimal('vSeg', 13, 2)->nullable()->default(null);
            $table->decimal('vDesc', 13, 2)->nullable()->default(null);
            $table->decimal('vOutro', 13, 2)->nullable()->default(null);
            $table->enum('indTot', ['0', '1'])->default('0');
            $table->string('xPed', 15)->nullable()->default(null);
            $table->string('nItemPed', 6)->nullable()->default(null);
            $table->string('nFCI', 36)->nullable()->default(null);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
