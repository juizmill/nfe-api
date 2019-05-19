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

            $table->string('name', 255);

            //Juristic person
            $table->string('fantasy', 255)->nullable()->default(null);
            $table->integer('company_identity')->nullable()->default(null);
            $table->string('cnpj', 14)->nullable()->default(null)->unique();

            //Physical person
            $table->string('cpf', 11)->nullable()->default(null)->unique();
            $table->date('birth')->nullable()->default(null);

            //Person
            $table->boolean('active')->default(true);
            $table->enum('type', ['J', 'F'])->default('J');
            $table->enum('type_customer', ['fabricante', 'fornecedor'])->default('fabricante');
            $table->string('cell_phone', 15)->nullable()->default(null);
            $table->string('phone', 15)->nullable()->default(null);
            $table->string('email', 255)->unique();

            //Address
            $table->string('neighborhood', 80);
            $table->integer('cep');
            $table->string('complement', 80)->nullable()->default(null);
            $table->string('address', 255);
            $table->string('city', 150);
            $table->string('establishment_number', 80);
            $table->string('state', 120);
            $table->enum('uf', ['AC', 'AL', 'AP', 'AM', 'BA', 'CE',
                'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PR', 'PB', 'PA', 'PE',
                'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SE', 'SP', 'TO']);

            $table->index('active');
            $table->index('type');
            $table->index('cnpj');
            $table->index('cpf');

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
