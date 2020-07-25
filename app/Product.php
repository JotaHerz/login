<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['title', 'url','description', 'image', 'cost'];

    public function getRouteKeyName()
    {
        return 'url';
    }

}
