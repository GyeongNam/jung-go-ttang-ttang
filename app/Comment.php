<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comment';
  protected $fillable =[
    'comment_id',
    'comm_item',
    'comments',
    'time'
  ];
  //
}
