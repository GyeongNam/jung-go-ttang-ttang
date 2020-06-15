<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enditem extends Model
{
  protected $table = 'enditem';
  protected $fillable =[
    'success_price1',
    'success_price2',
    'success_price3',
    'success_price4',
    'success_price5',
    'end_num'
  ];
}
