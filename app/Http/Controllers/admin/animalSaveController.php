<?php

namespace App\Http\Controllers\admin;

use App\AnimalSave;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class animalSaveController extends Controller
{
    public function index()
    {
        $headerTitle = "Penyelamatan Hewan";
        $title = "Data Penyelamatan Hewan";
        $posts = Post::with('saveRef', 'userRef')->where('category', 'Penyelamatan')->get();
        return view('admin.animalsave.index', compact('posts', 'headerTitle', 'title'));
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;

        try {
            $animalSave = AnimalSave::where('id', $id)->first();
            if ($animalSave) {
                $animalSave->status = $status;
                $animalSave->save();

                return response()->json([
                    "status" => 1,
                    "message" => "Status berhasil berubah",
                ]);
            } else {
                return response()->json([
                    "status" => 0,
                    "message" => "Data penyelamatan tidak ada",
                ]);
            }
        } catch (\Throwable $err) {
            return response()->json([
                "status" => 0,
                "message" => $err,
            ]);
        }
    }
}
