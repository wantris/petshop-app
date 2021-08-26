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
}
