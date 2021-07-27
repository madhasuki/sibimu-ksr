@extends('layouts.backend.main')
@section('title')
    Detail Anggota
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                NIA : {{ $anggota->nomor_induk_anggota }}
            </h6>
            <div class="dropdown no-arrow">
                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Action</div>
                    <a href="{{ route('admin.edit.anggota', ['id' => $anggota->id]) }}" class="dropdown-item">
                        <i class="fas fa-pencil-alt fa-sm fa-fw mr-2 text-gray-400"></i>Edit Data
                    </a>

                    {{-- dapat menghapus data anggota jika user login adalah admin --}}
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ route('admin.prosesHapus', ['id' => $anggota->id]) }}" class="dropdown-item">
                            <i class="fas fa-trash-alt fa-sm fa-fw mr-2 text-gray-400"></i>Hapus Data
                        </a>
                    @endif
                    {{-- ---------------------------------------- --}}
                    
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i> Cetak Data
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body row">
            <div class="col-lg-7">
                <div class="card shadow mb-4">
                    <a href="#collapseBiodata" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" 
                        aria-expanded="true" 
                        aria-controls="collapseBiodata">
                        <h6 class="m-0 font-weight-bold text-primary">Biodata</h6>
                    </a>
                    <div class="collapse show " id="collapseBiodata">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>{{ $anggota->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Panggilan</td>
                                    <td>{{ $anggota->nama_panggilan }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>{{ $anggota->tempat_lahir }}, {{ $anggota->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>{{ $anggota->agama }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan Darah</td>
                                    <td>{{ $anggota->golongan_darah }}</td>
                                </tr>
                                <tr>
                                    <td>Fakultas</td>
                                    <td>{{ $anggota->fakultas }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>{{ $anggota->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>{{ $anggota->nim }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $anggota->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <a href="#collapseBiodata3" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" 
                        aria-expanded="true" 
                        aria-controls="collapseBiodata3">
                        <h6 class="m-0 font-weight-bold text-primary">About Me</h6>
                    </a>
                    <div class="collapse show " id="collapseBiodata3">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>{{ $anggota->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Panggilan</td>
                                    <td>{{ $anggota->nama_panggilan }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>{{ $anggota->tempat_lahir }}, {{ $anggota->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>{{ $anggota->agama }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan Darah</td>
                                    <td>{{ $anggota->golongan_darah }}</td>
                                </tr>
                                <tr>
                                    <td>Fakultas</td>
                                    <td>{{ $anggota->fakultas }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>{{ $anggota->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>{{ $anggota->nim }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $anggota->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card shadow mb-4">
                    <a href="#collapseBiodata2" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" 
                        aria-expanded="true" 
                        aria-controls="collapseBiodata2">
                        <h6 class="m-0 font-weight-bold text-primary">Photo</h6>
                    </a>
                    <div class="collapse show " id="collapseBiodata2">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>{{ $anggota->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Panggilan</td>
                                    <td>{{ $anggota->nama_panggilan }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>{{ $anggota->tempat_lahir }}, {{ $anggota->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>{{ $anggota->agama }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan Darah</td>
                                    <td>{{ $anggota->golongan_darah }}</td>
                                </tr>
                                <tr>
                                    <td>Fakultas</td>
                                    <td>{{ $anggota->fakultas }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>{{ $anggota->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>{{ $anggota->nim }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $anggota->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <a href="#collapseBiodata4" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" 
                        aria-expanded="true" 
                        aria-controls="collapseBiodata4">
                        <h6 class="m-0 font-weight-bold text-primary">Contact</h6>
                    </a>
                    <div class="collapse show " id="collapseBiodata4">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>{{ $anggota->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Panggilan</td>
                                    <td>{{ $anggota->nama_panggilan }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>{{ $anggota->tempat_lahir }}, {{ $anggota->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>{{ $anggota->agama }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan Darah</td>
                                    <td>{{ $anggota->golongan_darah }}</td>
                                </tr>
                                <tr>
                                    <td>Fakultas</td>
                                    <td>{{ $anggota->fakultas }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>{{ $anggota->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>{{ $anggota->nim }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $anggota->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection