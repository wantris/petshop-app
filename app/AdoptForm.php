<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdoptForm extends Model
{
    public function userRef()
    {
        return $this->belongsTo(User::class, 'adopter_id', 'id');
    }

    public function adoptRef()
    {
        return $this->belongsTo(Adopt::class, 'adopt_id', 'id');
    }
}
