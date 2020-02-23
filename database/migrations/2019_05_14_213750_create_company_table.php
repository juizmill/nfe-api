<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('xNome', 60);
            $table->string('xFant', 60);
            $table->string('IE', 14)->nullable()->default(null);
            $table->string('IEST', 14)->nullable()->default(null);
            $table->string('IM', 15)->nullable()->default(null);
            $table->string('CNAE', 7)->nullable()->default(null);
            $table->enum('CRT', [1, 2, 3])->default(1);
            $table->string('CPFCNPJ', 14);
            $table->enum('type', ['J', 'F'])->default('J');

            //Endereço
            $table->string('xLgr', 191);
            $table->string('nro', 60);
            $table->string('xCpl', 60);
            $table->string('xBairro', 60);
            $table->string('cMun', 7);
            $table->string('xMun', 60);
            $table->string('UF', 2);
            $table->string('CEP', 8);
            $table->string('cPais', 4)->default(1058);
            $table->string('xPais', 60)->default('Brasil');
            $table->string('fone', 14);
            $table->boolean('active')->default(true);

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
