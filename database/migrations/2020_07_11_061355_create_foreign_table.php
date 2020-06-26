<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('items', function (Blueprint $table) {
      $table->string('seller_id')->index();
      $table->foreign('seller_id')->references('id')->on('users');
    });
    Schema::table('auction', function (Blueprint $table) {
      $table->unsignedBigInteger('auction_itemnum')->index();
      $table->foreign('auction_itemnum')->references('item_number')->on('items');
    });
    Schema::table('enditem', function (Blueprint $table) {
      $table->unsignedBigInteger('end_num')->index();
      $table->foreign('end_num')->references('item_number')->on('items');
    });
    Schema::table('favorite', function (Blueprint $table) {
      $table->unsignedBigInteger('favorite_itemnum')->index();
      $table->foreign('favorite_itemnum')->references('item_number')->on('items');
    });
    Schema::table('chatroom', function (Blueprint $table) {
      $table->string('user1_ID')->index();
      $table->foreign('user1_ID')->references('id')->on('users');

      $table->string('user2_ID')->index();
      $table->foreign('user2_ID')->references('id')->on('users');
    });
    Schema::table('message', function (Blueprint $table) {
      $table->integer('chat_num')->index();
      $table->foreign('chat_num')->references('chatroom_num')->on('chatroom');
    });
    Schema::table('comment', function (Blueprint $table){
      $table->string('comment_id')->index();
      $table->foreign('comment_id')->references('id')->on('users');

      $table->unsignedBigInteger('comm_item')->index();
      $table->foreign('comm_item')->references('item_number')->on('items');
    });
    Schema::table('authority', function (Blueprint $table) {
      $table->string('manage_id')->index();
      $table->foreign('manage_id')->references('id')->on('users');

      $table->unsignedBigInteger('successful_price')->index();
      $table->foreign('successful_price')->references('num')->on('enditem');
    });
    Schema::table('qna', function (Blueprint $table) {
      $table->string('qna_id')->index();
      $table->foreign('qna_id')->references('id')->on('users');

    });
    Schema::table('largecomment', function (Blueprint $table){
      $table->string('largecomment_id')->index();
      $table->foreign('largecomment_id')->references('id')->on('users');

      $table->unsignedBigInteger('largecomm_item')->index();
      $table->foreign('largecomm_item')->references('comment_num')->on('comment');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('items',    function (Blueprint $table){});
      Schema::table('auction',  function (Blueprint $table){});
        Schema::table('enditem',  function (Blueprint $table){});
          Schema::table('favorite', function (Blueprint $table){});
            Schema::table('chatroom', function (Blueprint $table){});
              Schema::table('messege',  function (Blueprint $table){});
                Schema::table('comment',  function (Blueprint $table){});
                  Schema::table('authority',function (Blueprint $table){});
                    Schema::table('qna',      function (Blueprint $table){});
                    }
                  }
