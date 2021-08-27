<?php

namespace App\Http\Controllers\admin;

use App\ChatRoom;
use App\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Events\RealTimeMessage;

class messageController extends Controller
{
    public function index()
    {
        $headerTitle = "Pesan";
        $title = "Data Pesan";
        $rooms = ChatRoom::with('userRef', 'messageRef')->get();

        return view('admin.message.index', compact('headerTitle', 'title', 'rooms'));
    }

    public function fetchByRoom($room_id)
    {
        $room = ChatRoom::find($room_id);
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
            $room = ChatRoom::find($request->room_id);

            if ($room) {
                $msg = new Message();
                $msg->chat_room_id = $room->id;
                $msg->user_id = $room->user_id;
                $msg->message = $request->message;
                $msg->admin_id = Session::get('id_admin');
                $msg->save();

                $data = [
                    'room_id' => $request->room_id,
                    'user_id' => $room->user_id,
                    'admin_id' => Session::get('id_admin'),
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
}
