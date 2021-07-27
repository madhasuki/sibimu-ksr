<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    public function admin()
    {
        $user = Auth::user();
        $anggota = Anggota::all();
        return view('admin/dashboard', compact('user', 'anggota'));
    }

    public function detail($id)
    {
        $user = Auth::user();
        $anggota = Anggota::find($id);
        return view('admin/anggota', compact('user', 'anggota'));
    }

    public function tambah()
    {
        $user = Auth::user();
        return view('admin/tambah_anggota', compact('user'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function prosesTambah(Request $request)
    {
        $anggota = new Anggota;
        $anggota->nomor_induk_anggota = $request->nia;
        $anggota->nama_lengkap = $request->fullname;
        $anggota->nama_panggilan = $request->shortname;
        $anggota->tempat_lahir = $request->birthplace;
        $anggota->tanggal_lahir = $request->birthday;
        $anggota->agama = $request->agama;
        $anggota->golongan_darah = $request->goldar;
        $anggota->fakultas = $request->fakultas;
        $anggota->jurusan = $request->jurusan;
        $anggota->nim = $request->nim;
        $anggota->alamat = $request->alamat;
        $anggota->save();

        $user = User::create([
            'name' => $request->shortname,
            'email' => $request->nia,
            'password' => Hash::make($request->nia),
        ]);

        $admin = Role::where('name', 'anggota')->first();
        $user->attachRole($admin);

        return redirect()->route('admin.dashboard');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $anggota = Anggota::find($id);
        return view('admin/edit_anggota', compact('user', 'anggota'));
    }

    public function prosesEdit(Request $request, $id)
    {
        $anggota = Anggota::find($id);
        $anggota->nomor_induk_anggota = $request->nia;
        $anggota->nama_lengkap = $request->fullname;
        $anggota->nama_panggilan = $request->shortname;
        $anggota->tempat_lahir = $request->birthplace;
        $anggota->tanggal_lahir = $request->birthday;
        $anggota->agama = $request->agama;
        $anggota->golongan_darah = $request->goldar;
        $anggota->fakultas = $request->fakultas;
        $anggota->jurusan = $request->jurusan;
        $anggota->nim = $request->nim;
        $anggota->alamat = $request->alamat;
        $anggota->save();

        return redirect()->route('admin.detail.anggota', ['id' => $anggota->id]);
    }

    public function hapus($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect()->route('admin.dashboard');
    }
}
