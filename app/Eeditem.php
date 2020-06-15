<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eeditem extends Model
{
  protected $table = 'enditem';
  protected $fillable =[
    'buyer_ID',
    'item_price',
    'auction_itemnum'
  ];
}
