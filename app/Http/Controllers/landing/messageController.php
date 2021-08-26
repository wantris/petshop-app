<?php

namespace App\Http\Controllers\landing;

use App\ChatRoom;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Events\RealTimeMessage;

class messageController extends Controller
{
    public function save(Request $request)
    {
        try {
            $room = ChatRoom::where('user_id', Session::get('id_pengguna'))->first();
            if ($room) {
                $msg = new Message();
                $msg->chat_room_id = $room->id;
                $msg->user_id = Session::get('id_pengguna');
                $msg->message = $request->message;
                $msg->save();

                return response()->json([
                    "status" => 1,
                    "message" => "Messsage saved",
                ]);
            }
        } catch (\Throwable $err) {

            return response()->json([
                "status" => 0,
                "message" => $$err,
            ]);
        }
    }

    public function trySocket()
    {
        event(new RealTimeMessage('Hello World'));
    }
}
