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
      'item_picture',
      'item_pictureup',
      'item_pictureback',
      'item_pictureleft',
      'item_picturefront',
      'item_picturerigth',
      'item_picturebehind',
      'item_startday',
      'item_startprice',
      'item_success',
      'success',
      'remember_token',
      'seller_id'
    ];
}
