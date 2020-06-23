<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenActivator extends Model
{
         protected $fillable=['user_id','token'];
         protected $primaryKey='token';
         protected $dates=['created_at'];
         public $incrementing=false;
         public $timestamps=false;
}
