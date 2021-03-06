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
    public function fetchAll()
    {
        $room = ChatRoom::where('user_id', Session::get('id_pengguna'))->first();
        $messages = collect();
        try {
            $messages = Message::where('chat_room_id', $room->id)->get();

            return response()->json([
                "status" => 1,
                "message" => "Messsage fetched",
                "data" => $messages
            ]);
        } catch (\Throwable $err) {
            return response()->json([
                "status" => 0,
                "message" => $$err,
                "data" => $messages
            ]);
        }
    }

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

                $data = [
                    'room_id' => $room->id,
                    'user_id' => Session::get('id_pengguna'),
                    'admin_id' => null,
                    'message' => $request->message
                ];

                $json_data = json_encode($data);

                event(new RealTimeMessage($json_data));

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
        $data = [
            'user_id' => 4,
            'admin_id' => 1,
            'message' => "iyaa ada apa"
        ];

        $json_data = json_encode($data);

        event(new RealTimeMessage($json_data));
    }
}
