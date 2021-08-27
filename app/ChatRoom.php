<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    public function messageRef()
    {
        return $this->hasMany(Message::class, 'chat_room_id', 'id');
    }

    public function userRef()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
