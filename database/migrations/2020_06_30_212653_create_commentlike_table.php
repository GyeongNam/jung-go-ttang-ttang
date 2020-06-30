<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentlikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentlike', function (Blueprint $table) {
            $table->bigIncrements('commentlike_num')->unique();
            $table->string('commentlike_name');
            $table->timestamps();
        });
        Schema::table('commentlike', function (Blueprint $table) {
          $table->unsignedBigInteger('commentlike_number')->index();
          $table->foreign('commentlike_number')->references('comment_num')->on('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentlike');
    }
}
