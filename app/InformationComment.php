<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationComment extends Model
{
    public function informationRef()
    {
        return $this->belongsTo(PetInformation::class, 'pet_information_id', 'id');
    }

    public function userRef()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function adminRef()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function commentChildRef()
    {
        return $this->hasMany(InformationComment::class,  'parent_id', 'id');
    }
}
