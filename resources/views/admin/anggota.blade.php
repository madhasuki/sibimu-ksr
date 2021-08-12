@extends('layouts.backend.main')
@section('title')
    Detail Anggota
@endsection
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Anggota</h1>
        <div>
            <a href="{{ route('admin.edit.anggota', ['id' => $anggota->id]) }}" class="btn btn-success btn-sm">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <a href="{{ route('admin.convert.pdf', ['id' => $anggota->id]) }}" class="btn btn-info btn-sm">
                <i class="fas fa-print"></i>
            </a>
            <a href="{{ route('admin.prosesHapus', ['id' => $anggota->id]) }}" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>
            </a>
        </div>
    </div>
    <div class="card-body row">
        <div class="col-lg-8">
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
                                <td>NIA</td>
                                <td>{{ $anggota->nia }}</td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>{{ $anggota->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td>Nama Panggilan</td>
                                <td>
                                    @if ( $anggota->nama_panggilan == NULL )
                                        -
                                    @else
                                        {{ $anggota->nama_panggilan }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>
                                    @if ($anggota->tempat_lahir == NULL AND $anggota->tanggal_lahir == NULL)
                                        -
                                    @else
                                        {{ $anggota->tempat_lahir }}, {{ $anggota->tanggal_lahir }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>
                                    @if ($anggota->agama == NULL)
                                        -
                                    @else
                                        {{ $anggota->agama }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Golongan Darah</td>
                                <td>
                                    @if ($anggota->goldar == NULL)
                                        -
                                    @else
                                        {{ $anggota->goldar }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Fakultas</td>
                                <td>{{ $anggota->fakultas }}</td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>
                                    @if ($anggota->jurusan == NULL)
                                        -
                                    @else
                                        {{ $anggota->jurusan }}
                                    @endif    
                                </td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>
                                    @if ($anggota->nim == NULL)
                                        -
                                    @else
                                        {{ $anggota->nim }}
                                    @endif
                                </td>
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
                                <td>Riwayat Pendidikan</td>
                            </tr>
                            <tr>
                                <td>SD</td>
                                <td>
                                    @if ($anggota->sd==NULL)
                                        -
                                    @else
                                        {{ $anggota->sd }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>SMP</td>
                                <td>
                                    @if ($anggota->smp==NULL)
                                        -
                                    @else
                                        {{ $anggota->smp }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>SMA</td>
                                <td>
                                    @if ($anggota->sma==NULL)
                                        -
                                    @else
                                        {{ $anggota->sma }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Hobi</td>
                                <td>
                                    @if ($anggota->hobi==NULL)
                                        -
                                    @else
                                        {{ $anggota->hobi }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Prestasi yang pernah diraih</td>
                                <td>
                                    @if ( $anggota->prestasi==NULL or $anggota->prestasi=="[null]")
                                        -
                                    @else
                                    <ol>
                                        @foreach ($prestasi as $pre)
                                            <li>{{ $pre }} </li>
                                        @endforeach
                                    </ol>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Status Kepengurusan</td>
                                <td>
                                    @if ( $anggota->status_pengurus =="[null]" or $anggota->status_pengurus==NULL)
                                        -
                                    @else
                                        <ol>
                                            @foreach ($status as $sp)
                                                <li>{{ $sp }} </li>
                                            @endforeach
                                        </ol>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Pelatihan yang pernah diikuti</td>
                            </tr>
                            <tr>
                                <td>Pelatihan PMI</td>
                                <td>
                                    @if ($anggota->pelatihan_pmi==NULL)
                                        -
                                    @else
                                        {{ $anggota->pelatihan_pmi }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Pelatihan diluar PMI</td>
                                <td>
                                    @if ($anggota->pelatihan_luar==NULL)
                                        -
                                    @else
                                        {{ $anggota->pelatihan_luar }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Spesialisasi yang dimiliki</td>
                            </tr>
                            <tr>
                                <td>Spesialisasi PMI</td>
                                <td>
                                    @if ($anggota->spesialisasi_pmi==NULL)
                                        -
                                    @else
                                        {{ $anggota->spesialisasi_pmi }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Spesialisasi diluar PMI</td>
                                <td>
                                    @if ($anggota->spesialisasi_luar==NULL)
                                        -
                                    @else
                                        {{ $anggota->spesialisasi_luar }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Pengalaman Kerja</td>
                                <td>{{ $anggota->pengalaman_kerja }}</td>
                            </tr>
                            <tr>
                                <td>Bakat</td>
                                <td>{{ $anggota->bakat }}</td>
                            </tr>
                            <tr>
                                <td>Cita-Cita</td>
                                <td>{{ $anggota->cita_cita }}</td>
                            </tr>
                            <tr>
                                <td>Motto Hidup</td>
                                <td>{{ $anggota->motto }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <a href="#collapseBiodata2" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" 
                    aria-expanded="true" 
                    aria-controls="collapseBiodata2">
                    <h6 class="m-0 font-weight-bold text-primary">Kontak</h6>
                </a>
                <div class="collapse show " id="collapseBiodata2">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nomor HP</td>
                                <td>
                                    @if ($anggota->nomor_hp == NULL)
                                        -
                                    @else
                                        {{ $anggota->nomor_hp }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>WhatsApp</td>
                                <td>
                                    @if ($anggota->whatsapp == NULL)
                                        -
                                    @else
                                        {{ $anggota->whatsapp }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Telegram</td>
                                <td>
                                    @if ($anggota->telegram == NULL)
                                        -
                                    @else
                                        {{ $anggota->telegram }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Facebook</td>
                                <td>
                                    @if ($anggota->facebook == NULL)
                                        -
                                    @else
                                        {{ $anggota->facebook }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Instagram</td>
                                <td>
                                    @if ($anggota->instagram == NULL)
                                        -
                                    @else
                                        {{ $anggota->instagram }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Twitter</td>
                                <td>
                                    @if ($anggota->twitter == NULL)
                                        -
                                    @else
                                        {{ $anggota->twitter }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>ID Line</td>
                                <td>
                                    @if ($anggota->id_line == NULL)
                                        -
                                    @else
                                        {{ $anggota->id_line }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Kesan </td>
                                <td>
                                    @if ($anggota->kesan == NULL)
                                        -
                                    @else
                                        {{ $anggota->kesan }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Pesan</td>
                                <td>
                                    @if ($anggota->pesan == NULL)
                                        -
                                    @else
                                        {{ $anggota->pesan }}
                                    @endif
                                </td>
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
                    <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                </a>
                <div class="collapse show " id="collapseBiodata4">
                    <div class="card-body">
                        @if ($anggota->foto==NULL)
                            <div class="image">
                                <div class="text-center">Foto 3x4</div>
                            </div>
                        @else
                            <img src="{{ asset('img/anggota/') . '/' . $anggota->foto }}" alt="Foto Profil" class="img card-img">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection