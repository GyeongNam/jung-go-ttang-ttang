<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qna', function (Blueprint $table) {
            $table->bigIncrements('qna_number');
            $table->string('qna_text');
            $table->string('qna_pass');
            $table->string('qna_title');
            $table->string('a_text')->nullable();
            $table->integer('qna_answer')->nullable();
            $table->timestamps();
            $table->rememberToken();
        });
        Schema::table('qna', function (Blueprint $table) {
          $table->string('qna_id')->index();
          $table->foreign('qna_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qna');
    }
}
