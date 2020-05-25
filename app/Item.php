<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable =[
      'item_number',
      'item_name',
      'item_maker',
      'item_buy',
      'item_category',
      'item_open',
      'item_deadline',
      'item_pictuer',
      'item_startday',
      'item_startprice',
      'item_success',
      'success',
      'remember_token',
      'seller_id'
    ];
}
