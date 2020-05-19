<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable =[
      'id',
      'name',
    	'phone',
      'email',
      'email_domain',
      'gender',
      'birthday',
      'password',
      //'user_image',
      'remember_token'
    ];
}
