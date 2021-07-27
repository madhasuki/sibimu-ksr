@extends('layouts.frontend.main')
@section('title')
    Edit Biodata
@endsection
@section('content')
    <h1 class="mt-4">Update Biodata</h1>
    <form action="{{ route('user.proses.update', ['id' => $biodata->id] ) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" name="fullname" id="fullname" class="form-control" value="{{ $biodata->nama_lengkap }}"> 
        </div>
        <div class="form-group">
            <label for="shortname">Nama Panggilan</label>
            <input type="text" name="shortname" id="shortname" class="form-control" value="{{ $biodata->nama_panggilan }}"> 
        </div>
        <div class="form-group">
            <label for="birth_place">Tempat Lahir</label>
            <input type="text" name="birth_place" id="birth_place" class="form-control" value="{{ $biodata->tempat_lahir }}">
        </div>
        <div class="form-group">
            <label for="birthday">Tanggal Lahir</label>
            <input type="date" name="birthday" id="birthday" class="form-control" value="{{ $biodata->tanggal_lahir }}">
        </div>
        <div class="form-group">
            <label for="agama">Agama</label>
            <input type="text" name="agama" id="agama" class="form-control" value="{{ $biodata->agama }}">
        </div>
        <div class="form-group">
            <label for="goldar">Golongan Darah</label>
            <input type="text" name="goldar" id="goldar" class="form-control" value="{{ $biodata->golongan_darah }}">
        </div>
        <input type="submit" value="Kirim" class="btn btn-primary">
    </form>
@endsection