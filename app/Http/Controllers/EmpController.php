<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpController extends Controller
{
    public function getAllAnggota()
    {
        $anggota = Anggota::all();
        return view('anggota', compact('anggota'));
    }

    public function downloadPDF()
    {
        $user = Auth::user();
        $anggota = Anggota::all();
        $pdf = PDF::loadView('anggota', compact('anggota'));
        return $pdf->download($user->name . '.pdf');
    }
}
