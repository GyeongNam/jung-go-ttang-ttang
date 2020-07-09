<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('item_number2');
          $table->string('report');
          $table->string('reportde');
          $table->foreign('item_number2')->references('item_number')->on('items');
          $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('police');
    }
}
