<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');

            //Company
            $table->string('regime', 120)->nullable()->default(null);
            $table->string('token_ibpt', 255)->nullable()->default(null);
            $table->string('csc_id', 120)->nullable()->default(null);
            $table->string('key_csc', 255)->nullable()->default(null);
            $table->string('certified', 255)->nullable()->default(null);
            $table->string('password_certified', 255)->nullable()->default(null);

            //NFE
            $table->boolean('ambient')->default(true);
            $table->string('logo_nfe', 255)->nullable()->default(null);
            $table->string('email_nfe', 255)->nullable()->default(null)->unique();
            $table->string('password_email_nfe', 255)->nullable()->default(null);

            //Juristic
            $table->string('name', 255);
            $table->string('fantasy', 255)->nullable()->default(null);
            $table->integer('identity')->nullable()->default(null);
            $table->string('cnpj', 14)->nullable()->default(null)->unique();

            //Person
            $table->boolean('active')->default(true);
            $table->enum('type', ['J', 'P'])->default('J');
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
            $table->index('ambient');
            $table->index('cnpj');

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
        Schema::dropIfExists('companies');
    }
}
