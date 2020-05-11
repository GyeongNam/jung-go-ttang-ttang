<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('items', function (Blueprint $table) {
        $table->bigIncrements('item_number');
        $table->integer('seller_id')->unsigned();
        $table->foreign('seller_id')->references('id')->on('usertable');
        $table->string('item_name');
        $table->string('item_maker')->nullable();
        $table->string('item_buy')->nullable();
        $table->string('item_category');
        $table->real('item_open')->nullable();
        $table->date('item_deadline');
        $table->binary('item_picture');
        $table->date('item_startday');
        $table->integer('item_startprice');
        $table->real('item_success');
        $table->real('success');
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
          Schema::dropIfExists('itemstable');
      }
  }
