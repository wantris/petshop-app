<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Post;
use App\PostComment;

class postCommentController extends Controller
{
    public function save(Request $request)
    {
        try {
            $comment = new PostComment();
            $comment->post_id = $request->post_id;
            $comment->user_id = Session::get('id_pengguna');
            $comment->parent_id = null;
            $comment->comment = $request->comment;
            $comment->save();

            $search = Post::find($request->post_id);
            $search->comment_count = (int)$search->comment_count + 1;
            $search->save();

            return redirect()->back();
        } catch (\Throwable $err) {
            return $err;
        }
    }

    public function reply(Request $request)
    {
        try {
            $comment = new PostComment();
            $comment->post_id = $request->post_id;
            $comment->user_id = Session::get('id_pengguna');
            $comment->parent_id = $request->parent_id;
            $comment->comment = $request->comment;
            $comment->save();

            $search = Post::find($request->post_id);
            $search->comment_count = (int)$search->comment_count + 1;
            $search->save();

            return redirect()->back();
        } catch (\Throwable $err) {
            return $err;
        }
    }
}
