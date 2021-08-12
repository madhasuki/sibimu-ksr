<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $anggota = $user->anggota;

        $prestasi = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->prestasi));
        $status = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->status_pengurus));
        return view('pengguna.index', compact('user', 'anggota', 'prestasi', 'status'));
    }

    // Menampilkan edit profil halaman pertama
    public function editHalamanSatu()
    {
        $user = Auth::user();
        $anggota = $user->anggota;
        return view('pengguna.edit', compact('user', 'anggota'));
    }

    // post request menyimpan hasil edit halaman pertama
    public function postEditHalamanSatu(Request $request)
    {

        $anggota['nia'] = $request->nia;
        $anggota['nama_lengkap'] = $request->fullname;
        $anggota['nama_panggilan'] = $request->shortname;
        $anggota['tempat_lahir'] = $request->birthplace;
        $anggota['tanggal_lahir'] = $request->birthday;
        $anggota['agama'] = $request->agama;
        $anggota['goldar'] = $request->goldar;
        $anggota['fakultas'] = $request->fakultas;
        $anggota['jurusan'] = $request->jurusan;
        $anggota['nim'] = $request->nim;
        $anggota['alamat'] = $request->alamat;

        $request->session()->put('anggota', $anggota);

        return redirect()->route('anggota.edit.kedua');
    }

    // Menampilkan edit profil halaman kedua
    public function editHalamanDua()
    {
        $user = Auth::user();
        $anggota = $user->anggota;
        $prestasi = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->prestasi));
        $status = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->status_pengurus));

        if ($status[0] == " null ") {
            $status = "";
        }

        if ($prestasi[0] == " null ") {
            $prestasi = "";
        }

        return view('pengguna.edit_kedua', compact('user', 'anggota', 'prestasi', 'status'));
    }

    // post request menyimpan hasil edit halaman kedua
    public function postEditHalamanDua(Request $request)
    {

        $anggota = $request->session()->get('anggota');
        $anggota['sd'] = $request->sd;
        $anggota['smp'] = $request->smp;
        $anggota['sma'] = $request->sma;
        $anggota['hobi'] = $request->hobi;
        $anggota['prestasi'] = $request->prestasi;
        $anggota['status_pengurus'] = $request->status_pengurus;
        $anggota['pelatihan_pmi'] = $request->pelatihan_pmi;
        $anggota['pelatihan_luar'] = $request->pelatihan_luar;
        $anggota['spesialisasi_pmi'] = $request->spesialisasi_pmi;
        $anggota['spesialisasi_luar'] = $request->spesialisasi_luar;
        $anggota['pengalaman_kerja'] = $request->pengalaman;
        $anggota['bahasa'] = $request->bahasa;
        $anggota['bakat'] = $request->bakat;
        $anggota['cita_cita'] = $request->cita;
        $anggota['motto'] = $request->motto;

        $request->session()->put('anggota', $anggota);

        return redirect()->route('anggota.edit.ketiga');
    }

    // Menampilkan edit profil halaman ketiga
    public function editHalamanTiga()
    {
        $user = Auth::user();
        $anggota = $user->anggota;
        return view('pengguna.edit_ketiga', compact('user', 'anggota'));
    }

    // post request menyimpan hasil edit halaman ketiga
    public function postEditHalamanTiga(Request $request)
    {
        $value = $request->session()->get('anggota');

        $user = Auth::user();
        $anggota = $user->anggota;
        $anggota->nia = $value['nia'];
        $anggota->nama_lengkap = $value['nama_lengkap'];
        $anggota->nama_panggilan = $value['nama_panggilan'];
        $anggota->tempat_lahir = $value['tempat_lahir'];
        $anggota->tanggal_lahir = $value['tanggal_lahir'];
        $anggota->agama = $value['agama'];
        $anggota->goldar = $value['goldar'];
        $anggota->fakultas = $value['fakultas'];
        $anggota->jurusan = $value['jurusan'];
        $anggota->nim = $value['nim'];
        $anggota->alamat = $value['alamat'];
        $anggota->sd = $value['sd'];
        $anggota->smp = $value['smp'];
        $anggota->sma = $value['sma'];
        $anggota->hobi = $value['hobi'];
        $anggota->prestasi = $value['prestasi'];
        $anggota->status_pengurus = $value['status_pengurus'];
        $anggota->pelatihan_pmi = $value['pelatihan_pmi'];
        $anggota->pelatihan_luar = $value['pelatihan_luar'];
        $anggota->spesialisasi_pmi = $value['spesialisasi_pmi'];
        $anggota->spesialisasi_luar = $value['spesialisasi_luar'];
        $anggota->pengalaman_kerja = $value['pengalaman_kerja'];
        $anggota->bahasa = $value['bahasa'];
        $anggota->bakat = $value['bakat'];
        $anggota->cita_cita = $value['cita_cita'];
        $anggota->motto = $value['motto'];
        $anggota->nomor_hp = $request->nomor_hp;
        $anggota->whatsapp = $request->whatsapp;
        $anggota->telegram = $request->telegram;
        $anggota->facebook = $request->facebook;
        $anggota->instagram = $request->instagram;
        $anggota->twitter = $request->twitter;
        $anggota->id_line = $request->line;
        $anggota->kesan = $request->kesan;
        $anggota->pesan = $request->pesan;
        $user->email = $request->email;

        if ($request->has('fileUpload')) {
            $request->validate([
                'fileUpload' => 'mimes:png,jpg,jpeg|max:1024',
            ]);

            if (Storage::exists(public_path('img\anggota') . '/' . $anggota->foto)) {
                Storage::delete(public_path('img\anggota') . '/' . $anggota->foto);
                Storage::delete(public_path('img\profil') . '/' . $anggota->foto);
            }

            $img = Image::make($request->fileUpload);
            $width = $img->width();
            $height = $img->height();
            if (($width / 3) > ($height / 4)) {
                $width = ($height / 4) * 3;
                $img->crop((int)$width, (int)$height);
            } else {
                $height = ($width / 3) * 4;
                $img->crop((int)$width, (int)$height);
            };

            $filename = time() . '-' . $value['nia'] . "." . $request->fileUpload->extension();

            $img->save(public_path('img\anggota') . '/' . $filename);

            if (($width / 3) > ($height / 4)) {
                $width = ($height / 4) * 3;
                $img->crop((int)$height, (int)$height);
            } else {
                $height = ($width / 3) * 4;
                $img->crop((int)$width, (int)$width);
            };
            $img->save(public_path('img\profil') . '/' . $filename);


            $anggota->foto = $filename;
        }

        $anggota->save();
        $user->save();
        $request->session()->forget('anggota');

        return redirect()->route('anggota.index');
    }

    public function changePassword()
    {
        $user = Auth::user();
        $anggota = $user->anggota;
        return view('pengguna.changePassword', compact('user', 'anggota'));
    }

    public function change(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'oldpass' => 'required',
            'newpass' => 'required|string|min:8',
            'confpass' => 'required'
        ]);

        if (!Hash::check($request->oldpass, $user->password)) {
            return back()->with('error', 'Password lama anda tidak sesuai!');
        }

        if ($request->newpass != $request->confpass) {
            return back()->with('error', 'Password baru dan konfirmasi password harus sama!');
        }

        $user->password = Hash::make($request->newpass);
        $user->save();
        return back()->with('success', 'Password berhasil di ubah!');
    }
}
