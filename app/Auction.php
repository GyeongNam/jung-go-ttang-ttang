<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $table = 'auction';
    protected $fillable =[
      'buyer_ID',
      'item_price',
      'auction_itemnum'
    ];
}
