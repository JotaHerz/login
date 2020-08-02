<?php

namespace App;

use App\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable =['title', 'url','description', 'image', 'cost', 'category_id'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category()
    {

       return $this->belongsTo(category::class);

    }
    // Scope
    public function scopeTitle($query,$title)
    {
        if($title)
            return $query->where('title', 'LIKE', "%$title%");

    }

}
