<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('ban_log', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('user_id');
           $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('ban_log');
    }
    
}
