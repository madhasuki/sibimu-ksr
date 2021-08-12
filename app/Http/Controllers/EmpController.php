<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     $anggota = Anggota::find($user->id - 1);

    //     $prestasi = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->prestasi));
    //     $status = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->status_pengurus));

    //     return view('anggota', compact('user', 'anggota'));
    // }

    public function downloadPDF()
    {
        $user = Auth::user();
        $anggota = $user->anggota;

        $prestasi = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->prestasi));
        $status = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->status_pengurus));

        $pdf = PDF::loadView('anggota', compact('user', 'anggota', 'prestasi', 'status'));
        return $pdf->download($anggota->nama_lengkap . '.pdf');
    }

    public function downloadPDFAdmin($id)
    {
        $anggota = Anggota::find($id);
        $user = User::find($anggota->user_id);

        $prestasi = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->prestasi));
        $status = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->status_pengurus));

        $pdf = PDF::loadView('anggota', compact('user', 'anggota', 'prestasi', 'status'));
        return $pdf->download($anggota->nama_lengkap . '.pdf');
    }
}
