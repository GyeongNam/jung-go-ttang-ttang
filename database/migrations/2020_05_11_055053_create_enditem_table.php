<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnditemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enditem', function (Blueprint $table) {
          $table->bigIncrements('num')->unique();
          $table->string('success_price1')->nullable();
          $table->string('success_price2')->nullable();
          $table->string('success_price3')->nullable();
          $table->string('success_price4')->nullable();
          $table->string('success_price5')->nullable();
          $table->rememberToken();
          $table->timestamps();
        });
        Schema::table('enditem', function (Blueprint $table) {
          $table->unsignedBigInteger('end_num')->index();
          $table->foreign('end_num')->references('item_number')->on('items');

          $table->string('success_user1')->nullable();
          $table->foreign('success_user1')->references('id')->on('users');
          $table->string('success_user2')->nullable();
          $table->foreign('success_user2')->references('id')->on('users');
          $table->string('success_user3')->nullable();
          $table->foreign('success_user3')->references('id')->on('users');
          $table->string('success_user4')->nullable();
          $table->foreign('success_user4')->references('id')->on('users');
          $table->string('success_user5')->nullable();
          $table->foreign('success_user5')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enditem');
    }
}
