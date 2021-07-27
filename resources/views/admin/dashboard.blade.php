@extends('layouts.backend.main')
@section('title')
    Admin Dashboard
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Anggota KSR PMI Unit UNTAN</h6>

        {{-- Dapat menambahkan user ketika admin login --}}
        @if (Auth::user()->hasRole('admin'))    
            <a href="{{ route('admin.tambah.anggota') }}" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
                    <span class="text">Tambah Anggota</span>
            </a>
        @endif
        {{-- ---------------------- --}}
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIA</th>
                        <th>Nama Lengkap</th>
                        <th>Fakultas</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $key=>$agt)
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('admin.detail.anggota', ['id'=>$agt->id]) }}" class="text-gray-600">
                                    {{ $key + 1 }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.detail.anggota', ['id'=>$agt->id]) }}" class="text-gray-600">
                                    {{ $agt->nomor_induk_anggota }}
                                </a> 
                            </td>
                            <td>
                                <a href="{{ route('admin.detail.anggota', ['id'=>$agt->id]) }}" class="text-gray-600">
                                    {{ $agt->nama_lengkap }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.detail.anggota', ['id'=>$agt->id]) }}" class="text-gray-600">
                                    {{ $agt->fakultas }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.detail.anggota', ['id'=>$agt->id]) }}" class="text-gray-600">
                                    {{ $agt->alamat }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection