<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalSave extends Model
{
    public function postRef()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
