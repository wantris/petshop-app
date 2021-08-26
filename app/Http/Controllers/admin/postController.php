<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
        $headerTitle = "Post";
        $title = "Data Post";
        $posts = Post::all();
        return view('admin.post.index', compact('posts', 'headerTitle', 'title'));
    }

    public function validatePost(Request $request)
    {
        try {
            $post = Post::find($request->id_post);
            $post->is_validate = $request->status;
            $post->save();

            return response()->json([
                "status" => 1,
                "message" => "Validasi berhasil",
            ]);
        } catch (\Throwable $err) {

            return response()->json([
                "status" => 0,
                "message" => $$err,
            ]);
        }
    }
}
