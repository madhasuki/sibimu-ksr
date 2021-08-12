@extends('layouts.backend.main')
@section('title')
    Pengguna
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna Website</h6>

        {{-- Dapat menambahkan user ketika admin login --}}
        @if (Auth::user()->hasRole('admin'))
            <a href="{{ route('admin.tambah.pengurus') }}" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
                    <span class="text">Tambah Pengurus</span>
            </a>
        @endif
        {{-- ---------------------- --}}
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengguna as $key=>$pgna)
                        @if ($pgna->hasRole('pengurus'))
                            <tr>
                                <td>{{ $pgna->name }}</td>
                                <td>{{ $pgna->email }}</td>
                                <td>
                                    <a href="{{ route('admin.prosesHapusPengurus', ['id' => $pgna->id]) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection