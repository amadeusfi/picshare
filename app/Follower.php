<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = ['follower_id', 'following_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userfollow()
    {
        return $this->belongsTo(User::class, 'following_id', 'id');
    }
}
