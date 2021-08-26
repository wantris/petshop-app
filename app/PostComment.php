<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    public function postRef()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function userRef()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function commentChildRef()
    {
        return $this->hasMany(PostComment::class,  'parent_id', 'id');
    }
}
