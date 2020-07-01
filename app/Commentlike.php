<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentlike extends Model
{
  protected $table = 'commentlike';
  protected $fillable =[
    'commentlike_num',
    'commentlike_name',
    'commentlike_number',
    'time'
  ];
    //
}
