<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use DB;
class reg extends Model
{  
    protected $table = 'users';
    
   protected $fillable = [
        'lastname', 'firstname', 'middlename', 'email', 'username', 'password', 'user_level', 'user_group', 'center'
    ];
    protected $hidden = [
        'password', 'remember_token',
       
    ];
}
