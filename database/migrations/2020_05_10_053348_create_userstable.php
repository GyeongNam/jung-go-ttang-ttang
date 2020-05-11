<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('last_name');
          $table->string('first_name');
          $table->Integer('phone');
          $table->string('email');
          $table->string('password');
          $table->string('gender');
          $table->integer('birthday');
          $table->string('password');
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
          Schema::dropIfExists('usertable');
      }
  }
