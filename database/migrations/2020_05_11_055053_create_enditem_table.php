<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnditemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enditem', function (Blueprint $table) {
          $table->bigIncrements('num')->unique();
          $table->string('success_price1')->nullable();
          $table->string('success_price2')->nullable();
          $table->string('success_price3')->nullable();
          $table->string('success_price4')->nullable();
          $table->string('success_price5')->nullable();
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
        Schema::dropIfExists('enditem');
    }
}
