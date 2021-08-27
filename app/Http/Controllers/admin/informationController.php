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
        $headerTitle = "Artikel";
        $title = "Data Artikel";
        $informations = PetInformation::all();
        return view('admin.information.index', compact('headerTitle', 'title', 'informations'));
    }

    public function create()
    {
        $headerTitle = "Artikel";
        $title = "Tambah Data Artikel";
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

            return redirect()->route('admin.information.index')->with('success', 'Tambah artikel berhasil');
        } catch (\Throwable $err) {
            return redirect()->route('')->with('failed', 'Tambah artikel gagal');
        }
    }

    public function edit($id)
    {

        $headerTitle = "Artikel";
        $title = "Edit Data Artikel";
        $info = PetInformation::find($id);

        return view('admin.information.edit', compact('headerTitle', 'title', 'info'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'konten' => 'required',
            'lokasi' => 'required',
        ]);

        $namePhoto = $request->old_photo;
        if ($request->file('photo')) {
            $resorcePhoto = $request->file('photo');
            $namePhoto  = "file_" . rand(00000, 99999) . "." . $resorcePhoto->getClientOriginalExtension();
            $resorcePhoto->move(\base_path() . "/public/assets/photo-pet/", $namePhoto);
        }

        try {
            $pet = PetInformation::find($id);
            $pet->admin_id = Session::get('id_admin');
            $pet->title = $request->title;
            $pet->content = $request->konten;
            $pet->location = $request->lokasi;
            $pet->photo = $namePhoto;
            $pet->save();

            return redirect()->route('admin.information.index')->with('success', 'Tambah pet informasi berhasil');
        } catch (\Throwable $err) {
            return redirect()->route('')->with('failed', 'Tambah pet informasi gagal');
        }
    }

    public function delete(Request $request)
    {
        try {
            PetInformation::where('id', $request->id_info)->delete();

            return response()->json([
                "status" => 1,
                "message" => "Artikel berhasil dihapus",
            ]);
        } catch (\Throwable $err) {

            return response()->json([
                "status" => 0,
                "message" => $$err,
            ]);
        }
    }
}
