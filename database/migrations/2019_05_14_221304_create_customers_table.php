<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('xNome', 60);
            $table->enum('indIEDest', [1, 2, 9])->default(9);
            $table->string('IE', 14)->nullable()->default(null);
            $table->string('ISUF', 9)->nullable()->default(null);
            $table->string('IM', 15)->nullable()->default(null);
            $table->string('email', 60)->nullable()->default(null);
            $table->string('CPFCNPJ', 14);
            $table->string('idEstrangeiro', 20)->nullable()->default(null);
            $table->enum('type', ['J', 'F'])->default('J');

            //Endereço
            $table->string('xLgr', 191);
            $table->string('nro', 60);
            $table->string('xCpl', 60)->nullable()->default(null);
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
