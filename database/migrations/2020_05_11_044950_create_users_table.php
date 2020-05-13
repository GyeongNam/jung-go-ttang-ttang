<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
       $table->string('id')->unique();
       $table->primary('id');
       $table->string('name');
       $table->Integer('phone');
       $table->string('email');
       $table->string('gender');
       $table->date('birthday');
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
        Schema::dropIfExists('users');
    }
}
