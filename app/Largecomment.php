<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Largecomment extends Model
{
    protected $table = 'largecomment';
    protected $fillable =[
      'largecomment_num',
      'largetime',
      'largecomments',
      'commentlike',
      'largecomment_id',
      'largecomm_item'
    ];
    //
}
