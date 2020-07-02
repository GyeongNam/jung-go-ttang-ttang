<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connect', function (Blueprint $table) {
            $table->bigIncrements('connect_num')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('connect', function (Blueprint $table) {
           $table->string('user_id')->index();
           $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connect');
    }
}
