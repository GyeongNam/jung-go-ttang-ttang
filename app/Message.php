<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $table = 'chatroom';
  protected $fillable =[
    'messege',
    'chatroom_num',
    'user1_ID',
    'remember_token',
    'created_at',
    'updated_at',
    'user2_ID'
  ];
}
