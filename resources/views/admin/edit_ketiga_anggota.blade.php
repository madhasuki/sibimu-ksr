@extends('layouts.backend.main')
@section('title')
    Edit Anggota
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1 class="h3 mb-0 text-gray-800">Edit Data Anggota</h1>
<div class="card shadow mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kontak</h6>
    </div>
    <div class="card-body">


        <form action="{{ route('admin.prosesEditTiga', ['id' => $anggota->id]) }}" method="POST" id="formEdit" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomor_hp">Nomor HP</label>
                <input type="text" name="nomor_hp" value="{{ $anggota->nomor_hp }}" id="nomor_hp" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label for="whatsapp">WhatsApp</label>
                <input type="text" name="whatsapp" value="{{ $anggota->whatsapp }}" id="whatsapp" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label for="telegram">Telegram</label>
                <input type="text" name="telegram" value="{{ $anggota->telegram }}" id="telegram" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" value="{{ $anggota->facebook }}" id="facebook" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" value="{{ $anggota->instagram }}" id="instagram" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" value="{{ $anggota->twitter }}" id="twitter" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label for="line">ID Line</label>
                <input type="text" name="line" value="{{ $anggota->id_line }}" id="line" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label for="line">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" id="email" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label for="kesan">Kesan</label>
                <textarea name="kesan" id="kesan" class="form-control form-control-sm">{{ $anggota->kesan }}</textarea>
            </div>
            <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea name="pesan" id="pesan" class="form-control form-control-sm">{{ $anggota->pesan }}</textarea>
            </div>
            <div class="form-group">
                <label for="fileUpload">Upload Foto</label>
                <input type="file" name="fileUpload" class="form-control form-control-sm">
            </div>
            
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('anggota.edit.kedua') }}" class="btn btn-danger pull-right">
                    Kembali
                </a>
                <input type="submit" value="Selanjutnya" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
    
@endsection