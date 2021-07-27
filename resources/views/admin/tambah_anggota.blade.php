@extends('layouts.backend.main')
@section('title')
    Tambah Anggota
@endsection
@section('content')
<h1 class="h3 mb-0 text-gray-800">Tambah Data Anggota</h1>
<div class="card shadow mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Biodata</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.prosesTambah') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nia">NIA </label>
                <input type="text" name="nia" placeholder="Nomor Induk Anggota" id="inputnia" class="form-control form-control-sm">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" name="fullname" placeholder="Nama Lengkap" id="fullname" class="form-control form-control-sm">
                </div>
                <div class="col-sm-6">
                    <label for="shortname">Nama Panggilan</label>
                    <input type="text" name="shortname" placeholder="Nama Panggilan" id="shortname" class="form-control form-control-sm">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="birthplace">Tempat Lahir</label> <br>
                    <input type="text" name="birthplace" placeholder="Tempat Lahir" id="birthplace" class="form-control form-control-sm">
                </div>
                <div class="col-sm-6">
                    <label for="birthplace">Tanggal Lahir</label> <br>
                    <input type="date" name="birthday" id="birthday" class="form-control form-control-sm" id="birthday" placeholder="mm/dd/yyyy"> 
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="agama">Agama </label>
                    <select name="agama" id="agama" class="form-control form-control-sm">
                        <option value="Islam" selected>Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Khatolik">Khatolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="goldar">Golongan Darah </label>
                    <select name="goldar" id="goldar" class="form-control form-control-sm">
                        <option value="none"><i>--none--</i></option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="fakultas">Fakultas </label>
                <select name="fakultas" id="fakultas" class="form-control form-control-sm">
                    <option value="Hukum" selected>Hukum</option>
                    <option value="Kedokteran">Kedokteran</option>
                    <option value="Teknik">Teknik</option>
                    <option value="Keguruan dan Ilmu Pendidikan">Keguruan dan Ilmu Pendidikan</option>
                    <option value="Ekonomi dan Bisnis">Ekonomi dan Bisnis</option>
                    <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                    <option value="Kehutanan">Kehutanan</option>
                    <option value="Pertanian">Pertanian</option>
                    <option value="Matematika dan Ilmu Pengetahuan Alam">Matematika dan Ilmu Pengetahuan Alam</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="jurusan">Jurusan </label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control form-control-sm" placeholder="Jurusan">
                </div>
                <div class="col-sm-6">
                    <label for="nim">NIM </label>
                    <input type="text" name="nim" id="nim" class="form-control form-control-sm" placeholder="Nomor Induk Mahasiswa">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control"></textarea>
            </div>
            <input type="submit" value="Kirim" class="btn btn-primary">
            {{-- <a href="#" class="btn btn-primary">Selanjutnya</a> --}}
        </form>
    </div>
</div>
    
@endsection