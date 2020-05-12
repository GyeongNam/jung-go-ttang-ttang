<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnditeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enditeam', function (Blueprint $table) {
          $table->string('success_price1')->unique();
          $table->primary('success_price1');
          $table->string('success_price2')->nullable();
          $table->string('success_price3')->nullable();
          $table->string('success_price4')->nullable();
          $table->string('success_price5')->nullable();
          /*$table->integer('end_number');*/
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
        Schema::dropIfExists('enditeam');
    }
}
