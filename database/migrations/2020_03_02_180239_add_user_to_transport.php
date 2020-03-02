<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserToTransport extends Migration
{
    public function up()
    {
        if (Schema::hasTable('transports')) {
            Schema::table('transports', function (Blueprint $table) {
                if (config('app.env') === 'testing') {
                    //Arrumando Bug do SqlIte
                    $table->unsignedBigInteger('user_id')->default('');
                } else {
                    $table->unsignedBigInteger('user_id');
                }
            });

            Schema::table('transports', function (Blueprint $table) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('transports')) {
            Schema::table('transports', function (Blueprint $table) {
                $table->dropForeign('transports_user_id_foreign');
                $table->dropColumn('user_id');
            });
        }
    }
}
