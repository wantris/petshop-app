<?php

namespace App\Http\Controllers\landing;

use App\Adopt;
use App\AdoptForm;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adoptController extends Controller
{
    public function index()
    {
        $pengguna = User::find(Session::get('id_pengguna'));
        $posts = Post::with('adoptRef')->where('user_id', Session::get('id_pengguna'))->where('category', 'Adopsi')->get();
        return view('landing.account.adopsi.index', compact('posts', 'pengguna'));
    }

    public function listSubmission()
    {
        $adopt_id = request()->adoptid;
        $pengguna = User::find(Session::get('id_pengguna'));
        $adopt = Adopt::with('formRef', 'formRef.userRef')->find($adopt_id);
        if ($adopt) {
            return view('landing.account.adopsi.list_pengajuan', compact('adopt', 'pengguna'));
        }
    }

    public function acceptSubmission(Request $request)
    {
        $submission = AdoptForm::find($request->submission_id);
        if ($submission) {
            try {
                $adopt = Adopt::with('formRef')->find($submission->adopt_id);

                foreach ($adopt->formRef as $key => $item) {
                    AdoptForm::where('id', $item->id)->update([
                        'checked' => 0
                    ]);
                }

                $submission->checked = 1;
                $submission->save();

                $adopt->is_validated_owner = 1;
                $adopt->save();

                return redirect()->route('pengguna.adopt.index')->with('success', 'Pengajuan telah diterima, tunggu admin untuk validasi');
            } catch (\Throwable $err) {
                return $err;
            }
        }

        return redirect()->back()->with('failed', 'Pengajuan tidak ada');
    }

    public function Jemput(Request $request)
    {
        $adopt = Adopt::where('id', $request->adopt_id)->first();
        if ($adopt) {
            $adopt->is_validated_owner = $request->status;
            $adopt->save();

            return response()->json([
                "status" => 1,
                "message" => "Sedang menjemput",
            ]);
        }

        return response()->json([
            "status" => 0,
            "message" => "Adopsi tidak ada",
        ]);
    }

    public function validateJemput(Request $request)
    {
        $adopt = Adopt::where('id', $request->adopt_id)->first();
        if ($adopt) {
            $adopt->is_validated_owner = $request->status;
            $adopt->save();

            return response()->json([
                "status" => 1,
                "message" => "Penjemputan berhasil di validasi",
            ]);
        }

        return response()->json([
            "status" => 0,
            "message" => "Adopsi tidak ada",
        ]);
    }

    public function userSubmissions()
    {
        $pengguna = User::find(Session::get('id_pengguna'));
        $posts = Post::with('adoptRef')->where('category', 'Adopsi')->whereHas('adoptRef.formRef', function ($query) {
            $query->where('adopter_id', Session::get('id_pengguna'));
        })->get();
        return view('landing.account.adopsi.user_submission', compact('posts', 'pengguna'));
    }

    public function showForm()
    {
        $adopt_id = request()->adoptid;
        if ($adopt_id) {
            $user = User::find(Session::get('id_pengguna'));
            $adopt = Adopt::find($adopt_id);
            return view('landing.adopt.form', compact('adopt_id', 'user', 'adopt'));
        }
    }

    public function saveForm(Request $request)
    {
        $validated = $request->validate([
            'age' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'adopt_id' => 'required'
        ]);

        try {
            $adopt = new AdoptForm();
            $adopt->adopt_id = $request->adopt_id;
            $adopt->adopter_id = Session::get('id_pengguna');
            $adopt->address = $request->address;
            $adopt->phone = $request->phone_number;
            $adopt->whatsapp_number = $request->wa_number;
            $adopt->age = $request->age;
            $adopt->email = $request->email;
            $adopt->save();

            return redirect()->route('pengguna.adopt.submission.index')->with('success', 'Berhasil mengajukan adopsi');
        } catch (\Throwable $err) {
            return $err;
        }
    }
}
