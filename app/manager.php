<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
  protected $table = 'authority';
  protected $fillable =[
    'authority_num',
    'ban',
    'warning',
    'manager_id',
    'successful_price'
  ];
}
