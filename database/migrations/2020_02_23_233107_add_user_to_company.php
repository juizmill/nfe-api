<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserToCompany extends Migration
{
    public function up()
    {
        if (Schema::hasTable('companies')) {
            Schema::table('companies', function (Blueprint $table) {
                if (config('app.env') === 'testing') {
                    //Arrumando Bug do SqlIte
                    $table->unsignedBigInteger('user_id')->default('');
                } else {
                    $table->unsignedBigInteger('user_id');
                }
            });

            Schema::table('companies', function (Blueprint $table) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('companies')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropForeign('companies_user_id_foreign');
                $table->dropColumn('user_id');
            });
        }
    }
}
