<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatroomtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatroomtable', function (Blueprint $table) {
          $table->bigIncrements('chatroom_num');
          $table->integer('user1_ID')->unsigned();
          $table->foreign('user1_ID')->references('id')->on('usertable');
          $table->integer('user2_ID')->unsigned();
          $table->foreign('user2_ID')->references('id')->on('usertable');
          $table->rememberToken();
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
        Schema::dropIfExists('chatroomtable');
    }
}
