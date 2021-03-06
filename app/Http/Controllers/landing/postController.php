<?php

namespace App\Http\Controllers\landing;

use App\Adopt;
use App\AnimalSave;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class postController extends Controller
{

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
            $post->user_id = Session::get('id_pengguna');
            $post->content = $request->content;
            $post->status = 1;
            $post->category = $request->category;
            $post->comment_count = 0;
            $post->photo = $namePhoto;
            $post->like_count = 0;
            $post->is_validate = 0;
            $post->admin_id = null;
            $post->save();

            $msg = "Postingan berhasil disimpan, tunggu validasi admin";

            if ($request->category == "Adopsi") {
                $code = random_int(0000, 9999) . "-" . random_int(0000, 9999) . "-" . random_int(0000, 9999);
                $adopt = new Adopt();
                $adopt->post_id = $post->id;
                $adopt->code = $code;
                $adopt->save();
            } elseif ($request->category == "Penyelamatan") {
                $save = new AnimalSave();
                $save->post_id = $post->id;
                $save->type = $request->animal_type;
                $save->save();

                $msg = "Penyelamatan hewan berhasil diajukan ke admin";
            }

            return redirect()->back()->with('success', $msg);
        } catch (\Throwable $err) {
            return $err;
        }
    }
}
