<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Anggota;
use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $prestasi = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->prestasi));
        $status = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->status_pengurus));

        return view('admin/anggota', compact('user', 'anggota', 'prestasi', 'status'));
    }

    public function tambah()
    {
        $user = Auth::user();
        return view('admin/tambah_anggota', compact('user'));
    }

    public function prosesTambah(Request $request)
    {
        $user = User::create([
            'name' => $request->nia,
            'email' => $request->email,
            'password' => Hash::make($request->nia),
        ]);

        $anggota = new Anggota;
        $anggota->nia = $request->nia;
        $anggota->nama_lengkap = $request->fullname;
        $anggota->fakultas = $request->fakultas;
        $anggota->alamat = $request->alamat;
        $anggota->user_id = $user->id;
        $anggota->save();

        $user_anggota = Role::where('name', 'anggota')->first();
        $user->attachRole($user_anggota);

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

        return redirect()->route('admin.edit.dua.anggota', ['id' => $id]);
    }

    public function editDua($id)
    {
        $user = Auth::user();
        $anggota = Anggota::find($id);
        $prestasi = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->prestasi));
        $status = explode(",", str_replace(array('[', '"', ']'), ' ', $anggota->status_pengurus));

        if ($status[0] == " null ") {
            $status = "";
        }

        if ($prestasi[0] == " null ") {
            $prestasi = "";
        }

        return view('admin/edit_kedua_anggota', compact('user', 'anggota', 'prestasi', 'status'));
    }

    public function prosesEditDua(Request $request, $id)
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

        return redirect()->route('admin.edit.tiga.anggota', ['id' => $id]);
    }

    public function editTiga($id)
    {
        $user = Auth::user();
        $anggota = Anggota::find($id);
        return view('admin.edit_ketiga_anggota', compact('user', 'anggota'));
    }

    public function prosesEditTiga(Request $request, $id)
    {
        $value = $request->session()->get('anggota');

        $user = Auth::user();
        $anggota = Anggota::find($id);
        $pengguna = User::find($anggota->user_id);
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
        $pengguna->email = $request->email;

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
        $pengguna->save();
        $request->session()->forget('anggota');

        return redirect()->route('admin.detail.anggota', ['id' => $id]);
    }

    public function hapus($id)
    {
        $anggota = Anggota::find($id);
        $user = User::find($anggota->user_id);
        $anggota->delete();
        $user->delete();

        return redirect()->route('admin.dashboard');
    }

    public function pengguna()
    {
        $user = Auth::user();
        $pengguna = User::all();

        return view('admin.pengguna', compact('user', 'pengguna'));
    }

    public function tambahPengurus()
    {
        $user = Auth::user();
        return view('admin/tambah_pengurus', compact('user'));
    }

    public function prosesTambahPengurus(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->password,
            'password' => Hash::make($request->password),
        ]);

        $user_anggota = Role::where('name', 'pengurus')->first();
        $user->attachRole($user_anggota);

        return redirect()->route('admin.pengguna');
    }

    public function hapusPengurus($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.pengguna');
    }
}
