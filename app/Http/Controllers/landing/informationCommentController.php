<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\InformationComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class informationCommentController extends Controller
{
    public function save(Request $request)
    {
        try {
            $comment = new InformationComment();
            $comment->pet_information_id = $request->information_id;
            $comment->user_id = Session::get('id_pengguna');
            $comment->parent_id = null;
            $comment->comment = $request->comment;
            $comment->save();

            return redirect()->back();
        } catch (\Throwable $err) {
            return $err;
        }
    }

    public function reply(Request $request)
    {
        try {
            $comment = new InformationComment();
            $comment->pet_information_id = $request->information_id;
            $comment->user_id = Session::get('id_pengguna');
            $comment->parent_id = $request->parent_id;
            $comment->comment = $request->comment;
            $comment->save();

            return redirect()->back();
        } catch (\Throwable $err) {
            return $err;
        }
    }
}
