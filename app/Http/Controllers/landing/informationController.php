<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\PetInformation;
use Illuminate\Http\Request;

class informationController extends Controller
{
    public function index()
    {
        $informations = PetInformation::all();
        $recents = PetInformation::with('adminRef')->orderBy('created_at', 'DESC')->limit(5)->get();

        return view('landing.information.index', compact('informations', 'recents'));
    }

    public function detail($id)
    {
        $info = PetInformation::with('commentRef', 'commentRef.commentChildRef')->find($id);

        if ($info) {
            $recents = PetInformation::with('adminRef')->orderBy('created_at', 'DESC')->limit(5)->get();
            return view('landing.information.detail', compact('info', 'recents'));
        }
        return redirect()->back();
    }
}
