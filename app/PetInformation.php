<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetInformation extends Model
{
    protected $table = "pet_informations";
    public function adminRef()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function commentRef()
    {
        return $this->hasMany(InformationComment::class,  'pet_information_id', 'id');
    }
}
