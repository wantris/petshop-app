<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
        $headerTitle = "Feed";
        $title = "Data Feed";
        $posts = Post::all();
        return view('admin.post.index', compact('posts', 'headerTitle', 'title'));
    }

    public function create()
    {
        $headerTitle = "Feed";
        $title = "Tambah Feed";

        return view('admin.post.create', compact('headerTitle', 'title'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        try {
            $namePhoto = null;
            if ($request->file('photo')) {
                $resorcePhoto = $request->file('photo');
                $namePhoto  = "file_" . rand(00000, 99999) . "." . $resorcePhoto->getClientOriginalExtension();
                $resorcePhoto->move(\base_path() . "/public/assets/photo-post/", $namePhoto);
            }

            $post = new Post();
            $post->admin_id = Session::get('id_admin');
            $post->content = $request->content;
            $post->status = 1;
            $post->comment_count = 0;
            $post->photo = $namePhoto;
            $post->like_count = 0;
            $post->is_validate = 1;
            $post->user_id = null;
            $post->save();

            return redirect()->back()->with('success', 'Posttingan berhasil disimpan');
        } catch (\Throwable $err) {
            return $err;
        }
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
