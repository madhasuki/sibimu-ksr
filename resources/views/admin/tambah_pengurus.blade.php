@extends('layouts.backend.main')
@section('title')
    Tambah Pengurus
@endsection
@section('content')
<h1 class="h3 mb-0 text-gray-800">Tambah Pengurus</h1>
<div class="card shadow mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengurus</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.prosesTambahPengurus') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" id="inputusername" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="password" class="form-control form-control-sm">
            </div>
            <input type="submit" value="Kirim" class="btn btn-primary">
        </form>
    </div>
</div>
    
@endsection