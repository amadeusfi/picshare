<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Image;
use App\User;

class Album extends Model
{
    protected $fillable = ['name', 'description', 'slug', 'image', 'category_id', 'user_id',];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function albumimages()
    {
        return $this->hasMany(Image::class, 'album_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
