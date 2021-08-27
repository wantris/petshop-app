<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\PetInformation;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $info_count = PetInformation::get()->count();
        $feed_count = Post::get()->count();
        $user_count = User::get()->count();

        return view('landing.template', compact('info_count', 'feed_count', 'user_count'));
    }
}
