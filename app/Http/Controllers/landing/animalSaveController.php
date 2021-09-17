<?php

namespace App\Http\Controllers\landing;

use App\AnimalSave;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class animalSaveController extends Controller
{
    public function index()
    {
        $pengguna = User::find(Session::get('id_pengguna'));
        $posts = Post::where('category', 'Penyelamatan')->where('user_id', Session::get('id_pengguna'))->get();

        return view('landing.account.animalsave.index', compact('posts', 'pengguna'));
    }

    public function statusUpdate(Request $request)
    {
        $status = $request->status;
        $save_id = $request->save_id;

        try {
            AnimalSave::where('id', $save_id)->update([
                'status' => $status
            ]);

            return redirect()->back()->with('success', 'Berhasil update status penyelamatan');
        } catch (\Throwable $err) {
            return redirect()->back()->with('failed', 'Gagal update status penyelamatan');
        }
    }
}
