<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\InformationComment;
use App\PetInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class informationCommentController extends Controller
{
    public function save(Request $request)
    {
        if (!Session::get('id_pengguna')) {
            return redirect()->back()->with('failed', 'Anda haru login');
        }
        try {
            $comment = new InformationComment();
            $comment->pet_information_id = $request->information_id;
            if (Session::get('id_pengguna')) {
                $comment->user_id = Session::get('id_pengguna');
            } else {
                $comment->admin_id = Session::get('id_admin');
            }
            $comment->parent_id = null;
            $comment->comment = $request->comment;
            $comment->save();

            $search = PetInformation::find($request->information_id);
            $search->comment_count = (int)$search->comment_count + 1;
            $search->save();

            return redirect()->back();
        } catch (\Throwable $err) {
            return redirect()->back();
        }
    }

    public function reply(Request $request)
    {
        if (!Session::get('id_pengguna')) {
            return redirect()->back()->with('failed', 'Anda haru login');
        }

        try {
            $comment = new InformationComment();
            $comment->pet_information_id = $request->information_id;
            if (Session::get('id_pengguna')) {
                $comment->user_id = Session::get('id_pengguna');
            } else {
                $comment->admin_id = Session::get('id_admin');
            }
            $comment->parent_id = $request->parent_id;
            $comment->comment = $request->comment;
            $comment->save();

            $search = PetInformation::find($request->information_id);
            $search->comment_count = (int)$search->comment_count + 1;
            $search->save();

            return redirect()->back();
        } catch (\Throwable $err) {
            return redirect()->back();
        }
    }
}
