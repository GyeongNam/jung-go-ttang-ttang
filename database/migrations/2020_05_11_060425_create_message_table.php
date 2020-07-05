<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->bigIncrements('message_number');
            /*$table->integer('chat_num');*/
            $table->string('time');
            $table->string('messege');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('message', function (Blueprint $table) {
          $table->unsignedBigInteger('chat_num')->index();
          $table->foreign('chat_num')->references('chatroom_num')->on('chatroom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message');
    }
}
