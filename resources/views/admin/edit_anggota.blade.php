@extends('layouts.backend.main')
@section('title')
    Edit Anggota
@endsection
@section('content')
<h1 class="h3 mb-0 text-gray-800">Edit Data Anggota</h1>
<div class="card shadow mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Biodata</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.prosesEdit', ['id' => $anggota->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nia">NIA </label>
                <input type="text" name="nia" value="{{ $anggota->nomor_induk_anggota }}" id="inputnia" class="form-control form-control-sm">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" name="fullname" value="{{ $anggota->nama_lengkap }}" id="fullname" class="form-control form-control-sm">
                </div>
                <div class="col-sm-6">
                    <label for="shortname">Nama Panggilan</label>
                    <input type="text" name="shortname" value="{{ $anggota->nama_panggilan }}" id="shortname" class="form-control form-control-sm">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="birthplace">Tempat Lahir</label> <br>
                    <input type="text" name="birthplace" value="{{ $anggota->tempat_lahir }}" id="birthplace" class="form-control form-control-sm">
                </div>
                <div class="col-sm-6">
                    <label for="birthplace">Tanggal Lahir</label> <br>
                    <input type="date" name="birthday" id="birthday" class="form-control form-control-sm" id="birthday" value="{{ $anggota->tanggal_lahir }}"> 
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="agama">Agama </label>
                    <select name="agama" id="agama" class="form-control form-control-sm">
                        <option value="Islam"
                            {{ ($anggota->agama == 'Islam') ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen"
                            {{ ($anggota->agama == 'Kristen') ? 'selected' : '' }}>Kristen</option>
                        <option value="Khatolik" 
                            {{ ($anggota->agama == 'Khatolik') ? 'selected' : '' }}>Khatolik</option>
                        <option value="Hindu"
                            {{ ($anggota->agama == 'Hindu') ? 'selected' : '' }}>Hindu</option>
                        <option value="Budha"
                            {{ ($anggota->agama == 'Budha') ? 'selected' : '' }}>Budha</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="goldar">Golongan Darah </label>
                    <select name="goldar" id="goldar" class="form-control form-control-sm">
                        <option value="none"
                            {{ ($anggota->golongan_darah == 'none') ? 'selected' : '' }}><i>--none--</i></option>
                        <option value="A+"
                            {{ ($anggota->golongan_darah == 'A+') ? 'selected' : '' }}>A+</option>
                        <option value="A-"
                            {{ ($anggota->golongan_darah == 'A-') ? 'selected' : '' }}>A-</option>
                        <option value="B+"
                            {{ ($anggota->golongan_darah == 'B+') ? 'selected' : '' }}>B+</option>
                        <option value="B-"
                            {{ ($anggota->golongan_darah == 'B-') ? 'selected' : '' }}>B-</option>
                        <option value="O+">
                            {{ ($anggota->golongan_darah == 'O+') ? 'selected' : '' }}O+</option>
                        <option value="O-"
                            {{ ($anggota->golongan_darah == 'O-') ? 'selected' : '' }}>O-</option>
                        <option value="AB+"
                            {{ ($anggota->golongan_darah == 'AB+') ? 'selected' : '' }}>AB+</option>
                        <option value="AB-" 
                            {{ ($anggota->golongan_darah == 'AB-') ? 'selected' : '' }}>AB-</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="fakultas">Fakultas </label>
                <select name="fakultas" id="fakultas" class="form-control form-control-sm">
                    <option value="Hukum" 
                        {{ ($anggota->fakultas == 'Hukum') ? 'selected' : '' }}>Hukum</option>
                    <option value="Kedokteran" 
                        {{ ($anggota->fakultas == 'Kedokteran') ? 'selected' : '' }}>Kedokteran</option>
                    <option value="Teknik" 
                        {{ ($anggota->fakultas == 'Teknik') ? 'selected' : '' }}>Teknik</option>
                    <option value="Keguruan dan Ilmu Pendidikan" 
                        {{ ($anggota->fakultas == 'Keguruan dan Ilmu Pendidikan') ? 'selected' : '' }}>Keguruan dan Ilmu Pendidikan</option>
                    <option value="Ekonomi dan Bisnis" 
                        {{ ($anggota->fakultas == 'Ekonomi dan Bisnis') ? 'selected' : '' }}>Ekonomi dan Bisnis</option>
                    <option value="Ilmu Sosial dan Ilmu Politik"
                        {{ ($anggota->fakultas == 'Ilmu Sosial dan Ilmu Politik') ? 'selected' : '' }}>Ilmu Sosial dan Ilmu Politik</option>
                    <option value="Kehutanan"
                        {{ ($anggota->fakultas == 'Kehutanan') ? 'selected' : '' }}>Kehutanan</option>
                    <option value="Pertanian" 
                        {{ ($anggota->fakultas == 'Pertanian') ? 'selected' : '' }}>Pertanian</option>
                    <option value="Matematika dan Ilmu Pengetahuan Alam" 
                        {{ ($anggota->fakultas == 'Matematika dan Ilmu Pengetahuan Alam') ? 'selected' : '' }}>Matematika dan Ilmu Pengetahuan Alam</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="jurusan">Jurusan </label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control form-control-sm" value="{{ $anggota->jurusan }}">
                </div>
                <div class="col-sm-6">
                    <label for="nim">NIM </label>
                    <input type="text" name="nim" id="nim" class="form-control form-control-sm" value="{{ $anggota->nim }}">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control">{{ $anggota->alamat }}</textarea>
            </div>
            <input type="submit" value="Kirim" class="btn btn-primary">
            {{-- <a href="#" class="btn btn-primary">Selanjutnya</a> --}}
        </form>
    </div>
</div>
    
@endsection