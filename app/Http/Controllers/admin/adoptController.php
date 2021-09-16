<?php

namespace App\Http\Controllers\admin;

use App\Adopt;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class adoptController extends Controller
{
    public function index()
    {
        $headerTitle = "Data Adopsi";
        $title = "Adopsi";
        $posts = Post::with('adoptRef')->where('category', 'Adopsi')->whereHas('adoptRef', function ($query) {
            $query->where('is_validated_owner', 1);
        })->get();

        return view('admin.adopt.index', compact('posts', 'headerTitle', 'title'));
    }

    public function listSubmission()
    {
        $adopt_id = request()->adoptid;

        $adopt = Adopt::with('postRef', 'formRef', 'formRef.userRef', 'formRef.adoptRef')->find($adopt_id);
        if ($adopt) {
            $headerTitle = "Data Adopsi";
            $title = "Adopsi";
            return view('admin.adopt.list_submission', compact('adopt', 'headerTitle', 'title'));
        }
    }

    public function validateSubmission(Request $request)
    {
        try {
            $adopt = Adopt::where('id', $request->adopt_id)->update([
                'is_validated_admin' => $request->status,
                'is_adopt' => $request->status
            ]);

            if ($request->status == 1) {
                $message = 'Pengajuan adopsi berhasil divalidasi';
            } else {
                $message = 'Pengajuan adopsi batal divalidasi';
            }

            return response()->json([
                "status" => 1,
                "message" => $message,
            ]);
            return redirect()->route('admin.adopt.index')->with('success',);
        } catch (\Throwable $err) {
            return response()->json([
                "status" => 0,
                "message" => $$err,
            ]);
        }
    }
}
