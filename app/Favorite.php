<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
  protected $table = 'favorite';
  protected $fillable =[
    'buyer_ID',
    'item_price',
    'auction_itemnum'
  ];
}
