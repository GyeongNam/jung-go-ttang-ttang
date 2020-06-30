<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLargecommentTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('largecomment', function (Blueprint $table) {
      $table->bigIncrements('largecomment_num');
      $table->date('largetime');
      $table->string('largecomments');
      $table->bigInteger('commentlike');
      $table->timestamps();
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
    Schema::dropIfExists('largecomment');
  }
}
