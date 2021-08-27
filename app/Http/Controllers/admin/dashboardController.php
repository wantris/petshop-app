<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Post;
use App\PetInformation;
use App\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $headerTitle = "Dashboard";
        $title = "Dashboard Admin";
        $info_count = PetInformation::get()->count();
        $feed_count = Post::get()->count();
        $user_count = User::get()->count();
        $msg_count = Message::get()->count();
        return view('admin.dashboard', compact('title', 'headerTitle', 'info_count', 'feed_count', 'user_count', 'msg_count'));
    }
}
