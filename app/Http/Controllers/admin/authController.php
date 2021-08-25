<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function index()
    {
        $title = "Login";
        return view('admin.auth.login', compact('title'));
    }

    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        $check_username = Admin::where('username', $username)->first();
        // check username
        if ($check_username) {
            if (Hash::check($password, $check_username->password)) {
                Session::put('is_admin', '1');
                Session::put('is_pengguna', '0');
                Session::put('id_admin', $check_username->id);
                return redirect()->route('admin.dashboard.index');
            } else {
                return redirect()->back()->with('failed', 'Password salah');
            }
        } else {
            return redirect()->back()->with('failed', 'Username tidak ada');
        }
    }
}
