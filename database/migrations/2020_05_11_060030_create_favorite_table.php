<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite', function (Blueprint $table) {
          $table->bigIncrements('favorite_num')->unique();
          $table->string('favorite_name');
          $table->rememberToken();
          $table->timestamps();
        });
        Schema::table('favorite', function (Blueprint $table) {
          $table->unsignedBigInteger('favorite_itemnum')->index();
          $table->foreign('favorite_itemnum')->references('item_number')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite');
    }
}
