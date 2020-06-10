<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
  protected $table = 'favorite';
  protected $fillable =[
    'favorite_itemnum',
    'favorite_name'
  ];
}
