<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $headerTitle = "Dashboard";
        $title = "Dashboard Admin";
        return view('admin.dashboard', compact('headerTitle', 'title'));
    }
}
