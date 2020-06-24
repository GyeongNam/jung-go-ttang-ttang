<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('items', function (Blueprint $table) {
     $table->bigIncrements('item_number')->unique();
     //$table->primary('item_number');
     /*$table->string('seller_id');*/
     $table->string('item_name');
     $table->string('item_maker')->nullable();
     $table->date('item_buy')->nullable();
     $table->string('item_category');
     $table->boolean('item_open')->nullable();
     $table->date('item_deadline');
     $table->binary('item_picture');
     $table->binary('item_pictureup')->nullable();
     $table->binary('item_picturefront')->nullable();
     $table->binary('item_pictureback')->nullable();
     $table->binary('item_pictureleft')->nullable();
     $table->binary('item_picturerigth')->nullable();
     $table->binary('item_picturebehind')->nullable();

     $table->string('postcode')->nullable();
     $table->string('roadAddress')->nullable();
     $table->string('jibunAddress')->nullable();
     $table->string('Address_detail')->nullable();

     $table->longText('item_info')->nullable();
     $table->date('item_startday');
     $table->string('item_startprice');
     $table->boolean('item_success');
     $table->boolean('success');
     $table->integer('visit_count')->nullable();
     $table->integer('like')->nullable();
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
        Schema::dropIfExists('items');
    }
}
