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
            <div class="form-group">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" name="fullname" placeholder="Nama Lengkap" id="fullname" class="form-control form-control-sm">
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
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control"></textarea>
            </div>
            <input type="submit" value="Kirim" class="btn btn-primary">
        </form>
    </div>
</div>
    
@endsection