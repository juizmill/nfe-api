<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserToCustomer extends Migration
{
    public function up()
    {
        if (Schema::hasTable('customers')) {
            Schema::table('customers', function (Blueprint $table) {
                if (config('app.env') === 'testing') {
                    //Arrumando Bug do SqlIte
                    $table->unsignedBigInteger('user_id')->default('');
                } else {
                    $table->unsignedBigInteger('user_id');
                }
            });

            Schema::table('customers', function (Blueprint $table) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('customers')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->dropForeign('customers_user_id_foreign');
                $table->dropColumn('user_id');
            });
        }
    }
}
