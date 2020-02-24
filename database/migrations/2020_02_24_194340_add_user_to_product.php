<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserToProduct extends Migration
{
    public function up()
    {
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (config('app.env') === 'testing') {
                    //Arrumando Bug do SqlIte
                    $table->unsignedBigInteger('user_id')->default('');
                } else {
                    $table->unsignedBigInteger('user_id');
                }
            });

            Schema::table('products', function (Blueprint $table) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropForeign('products_user_id_foreign');
                $table->dropColumn('user_id');
            });
        }
    }
}
