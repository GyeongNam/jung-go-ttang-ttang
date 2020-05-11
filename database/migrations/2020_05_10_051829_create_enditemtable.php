<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnditemtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enditemtable', function (Blueprint $table) {
            $table->bigIncrements('success_price1');
            $table->string('success_price2')->nullable();
            $table->string('success_price3')->nullable();
            $table->string('success_price4')->nullable();
            $table->string('success_price5')->nullable();
            $table->integer('item_number')->unsigned();
            $table->foreign('item_number')->references('auction_number')->on('auctiontable');
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
        Schema::dropIfExists('enditemtable');
    }
}
