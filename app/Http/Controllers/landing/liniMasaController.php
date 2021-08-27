<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\PetInformation;
use App\Post;
use App\User;

class liniMasaController extends Controller
{
    public function index()
    {
        $posts = Post::with('commentRef', 'userRef')->where('is_validate', 1)->get();
        $recents = PetInformation::with('adminRef')->orderBy('created_at', 'DESC')->limit(5)->get();
        $pengguna = User::find(Session::get('id_pengguna'));
        return view('landing.linimasa.index', compact('recents', 'posts', 'pengguna'));
    }
}
