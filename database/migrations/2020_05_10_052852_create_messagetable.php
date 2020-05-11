<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagetable', function (Blueprint $table) {
              $table->bigIncrements('message_number');
              $table->integer('chatroom_num')->unsigned();
              $table->foreign('chatroom_num')->references('chatroom_num')->on('chatroomtable');
              $table->integer('time');
              $table->string('messege');
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
        Schema::dropIfExists('messagetable');
    }
}
