<?php

namespace App;

use App\category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['title', 'url','description', 'image', 'cost', 'category_id'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category()
    {
       return $this->belongsTo(category::class);

    }

}
