<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function index($id)
    {
        $biodata = Biodata::find($id);
        return view('pengguna.index', compact('biodata', 'id'));
    }

    public function updateForm($id)
    {
        $biodata = Biodata::find($id);
        return view('pengguna.update', compact('biodata'));
    }

    public function updateData(Request $request, $id)
    {
        $biodata = Biodata::find($id);
        $biodata->nama_lengkap = $request->fullname;
        $biodata->nama_panggilan = $request->shortname;
        $biodata->tempat_lahir = $request->birth_place;
        $biodata->tanggal_lahir = $request->birthday;
        $biodata->agama = $request->agama;
        $biodata->golongan_darah = $request->goldar;
        $biodata->save();

        return redirect()->route('user.dashboard', ['id' => $biodata->id]);
    }
}
