<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class accountController extends Controller
{
    public function index($username)
    {
        $pengguna = User::where('username', $username)->first();
        $posts = Post::where('user_id', Session::get('id_pengguna'))->where('is_validate', 1)->get();
        return view('landing.account.index', compact('pengguna', 'posts'));
    }

    public function profile($username)
    {
        $pengguna = User::where('username', $username)->first();
        return view('landing.account.profile', compact('pengguna'));
    }

    public function postProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required',
            'email' => 'required',
        ]);

        $namePhoto = $request->old_photo;
        if ($request->file('photo')) {
            $resorcePhoto = $request->file('photo');
            $namePhoto  = "file_" . rand(00000, 99999) . "." . $resorcePhoto->getClientOriginalExtension();
            $resorcePhoto->move(\base_path() . "/public/asset-landing/photo-profil/", $namePhoto);
        }

        try {
            $user = User::find(Session::get('id_pengguna'));
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->description = $request->description;
            $user->photo = $namePhoto;
            $user->save();

            return redirect()->back()->with('success', 'Profil berhasil diupdate');
        } catch (\Throwable $err) {
            return $err;
        }
    }
}
