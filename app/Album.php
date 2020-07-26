<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name', 'description', 'slug', 'image', 'category_id', 'user_id',];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
