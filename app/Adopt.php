<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adopt extends Model
{
    public function postRef()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function formRef()
    {
        return $this->hasMany(AdoptForm::class, 'adopt_id', 'id');
    }
}
