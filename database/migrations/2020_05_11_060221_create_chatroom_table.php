<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatroom', function (Blueprint $table) {
        $table->integer('chatroom_num')->unique();
        $table->primary('chatroom_num');
        /*$table->integer('user1_ID');*/
        /*$table->integer('user2_ID');*/
        $table->rememberToken();
        $table->timestamps();
        });
        Schema::table('chatroom', function (Blueprint $table) {
          $table->string('user1_ID')->index();
          $table->foreign('user1_ID')->references('id')->on('users');

          $table->string('user2_ID')->index();
          $table->foreign('user2_ID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chatroom');
    }
}
