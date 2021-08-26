<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function userRef()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function CommentRef()
    {
        return $this->hasMany(PostComment::class,  'post_id', 'id');
    }
}
