<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\PetInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class informationController extends Controller
{
    public function index()
    {
        $headerTitle = "Informasi";
        $title = "Data Informasi";
        $informations = PetInformation::all();
        return view('admin.information.index', compact('headerTitle', 'title', 'informations'));
    }

    public function create()
    {
        $headerTitle = "Informasi";
        $title = "Tambah Data Informasi";
        return view('admin.information.add', compact('headerTitle', 'title'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'konten' => 'required',
            'lokasi' => 'required',
        ]);

        $namePhoto = null;
        if ($request->file('photo')) {
            $resorcePhoto = $request->file('photo');
            $namePhoto  = "file_" . rand(00000, 99999) . "." . $resorcePhoto->getClientOriginalExtension();
            $resorcePhoto->move(\base_path() . "/public/assets/photo-pet/", $namePhoto);
        }

        try {
            $pet = new PetInformation();
            $pet->admin_id = Session::get('id_admin');
            $pet->title = $request->title;
            $pet->content = $request->konten;
            $pet->location = $request->lokasi;
            $pet->photo = $namePhoto;
            $pet->save();

            return redirect()->route('admin.information.index')->with('success', 'Tambah pet informasi berhasil');
        } catch (\Throwable $err) {
            dd($err);
            return redirect()->route('')->with('failed', 'Tambah pet informasi gagal');
        }
    }
}
