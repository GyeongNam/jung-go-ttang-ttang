<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $table = 'chatroom';
  protected $fillable =[
    'messege',
    'chat_num',
    'user1_ID',
    'created_at',
    'user2_ID'
  ];
}
