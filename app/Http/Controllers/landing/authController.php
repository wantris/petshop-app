<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public function index()
    {
        return view('landing.auth.login');
    }

    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        $check_username = User::where('username', $username)->first();
        // check username
        if ($check_username) {
            if (Hash::check($password, $check_username->password)) {
                Session::put('is_admin', '0');
                Session::put('is_pengguna', '1');
                Session::put('id_pengguna', $check_username->id);
                return redirect('/');
            } else {
                return redirect()->back()->with('failed', 'Password salah');
            }
        } else {
            return redirect()->back()->with('failed', 'Username tidak ada');
        }
    }

    public function register()
    {
        return view('landing.auth.register');
    }

    public function postRegister(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'passwword' => 'required',
            'confirm_password' =>  'required|same:password',
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('pengguna.auth.login');
        } catch (\Throwable $err) {
            return $err;
        }
    }
}
