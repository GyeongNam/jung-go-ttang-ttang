<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBantimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bantime', function (Blueprint $table) {
            $table->bigIncrements('ban_num')->unique();
            $table->integer('ban');
            $table->Date('ban_startdate');
            $table->Date('ban_enddate');
            $table->timestamps();
        });
        Schema::table('bantime', function (Blueprint $table) {
           $table->string('user_id')->index();
           $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bantime');
    }
}
