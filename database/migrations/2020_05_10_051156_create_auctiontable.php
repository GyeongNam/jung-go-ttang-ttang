<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctiontable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctiontable', function (Blueprint $table) {
              $table->bigIncrements('auction_number');
              $table->integer('item_number')->unsigned();
              $table->foreign('item_number')->references('item_number')->on('itemstable');
              $table->string('buyer_ID');
              $table->integer('item_price');
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
        Schema::dropIfExists('auctiontable');
    }
}
