@extends('layouts.backend.main')
@section('title')
    Edit Anggota
@endsection
@section('content')



<div id="templatePrestasi" style="display:none !important">
    <div class="d-sm-flex align-items-center justify-content-between mt-2">
        <input type="text" name="prestasi[]" class="form-control form-control-sm col-sm-10"> 
        <button type="button" class="remove btn btn-danger btn-sm btn-icon-split">
            <span class="icon"><i class="fas fa-trash"></i></span>
            <span class="text">Hapus</span>
        </button>
    </div>
</div>

<div id="templatePengurus" style="display:none !important">
    <div class="d-sm-flex align-items-center justify-content-between mt-2">
        <input type="text" name="status_pengurus[]" class="form-control form-control-sm col-sm-10"> 
        <button type="button" class="remove btn btn-danger btn-sm btn-icon-split">
            <span class="icon"><i class="fas fa-trash"></i></span>
            <span class="text">Hapus</span>
        </button>
    </div>
</div>

<h1 class="h3 mb-0 text-gray-800">Edit Data Anggota</h1>
<div class="card shadow mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tentang Saya</h6>
    </div>
    <div class="card-body">


        <form action="{{ route('anggota.edit.post.kedua') }}" method="POST" id="formEdit">
            @csrf
            <div class="form-group">
                <label for="sd">Pendidikan </label>
                <div class="form-group">
                    <label for="sd">SD</label>
                    <input type="text" name="sd" value="{{ $anggota->sd }}" id="sd" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="smp">SMP</label>
                    <input type="text" name="smp" value="{{ $anggota->smp }}" id="smp" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="sma">SMA</label>
                    <input type="text" name="sma" value="{{ $anggota->sma }}" id="sma" class="form-control form-control-sm">
                </div>
            </div>
            <div class="form-group">
                <label for="hobi">Hobi</label>
                <input type="text" name="hobi" value="{{ $anggota->hobi }}" id="hobi" class="form-control form-control-sm">
            </div>
            <div class="form-group" id="prestasiField">
                <label for="prestasi">Prestasi yang pernah dicapai</label>
                @if ($prestasi == NULL)
                    <div class="d-sm-flex align-items-center justify-content-between mt-2">
                        <input type="text" name="prestasi[]" value="" id="prestasi" class="form-control form-control-sm col-sm-10">
                        
                        <button type="button" class="btn btn-info btn-sm btn-icon-split addPrestasi" id="tambahPrestasi">
                            <span class="icon"><i class="fas fa-plus"></i></span>
                            <span class="text">Tambah</span>
                        </button>
                    </div>
                @else 
                    @foreach ($prestasi as $pre)
                        <div class="d-sm-flex align-items-center justify-content-between mt-2">
                            <input type="text" name="prestasi[]" value="{{ $pre }}" id="prestasi" class="form-control form-control-sm col-sm-10">
                            
                            <button type="button" class="btn btn-info btn-sm btn-icon-split addPrestasi" id="tambahPrestasi">
                                <span class="icon"><i class="fas fa-plus"></i></span>
                                <span class="text">Tambah</span>
                            </button>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="form-group" id="pengurusField">
                <label for="pengurus">Status Kepengurusuan</label>
                @if ($status == NULL)
                    <div class="d-sm-flex align-items-center justify-content-between mt-2">
                        <input type="text" name="status_pengurus[]" value="" id="pengurus" class="form-control form-control-sm col-sm-10">
                        <button type="button" class="btn btn-info btn-sm btn-icon-split addPengurus" id="tambahPengurus">
                            <span class="icon"><i class="fas fa-plus"></i></span>
                            <span class="text">Tambah</span>
                        </button>
                    </div>
                @else
                    @foreach ($status as $sp)    
                    <div class="d-sm-flex align-items-center justify-content-between mt-2">
                        <input type="text" name="status_pengurus[]" value="{{ $sp }}" id="pengurus" class="form-control form-control-sm col-sm-10">
                        <button type="button" class="btn btn-info btn-sm btn-icon-split addPengurus" id="tambahPengurus">
                            <span class="icon"><i class="fas fa-plus"></i></span>
                            <span class="text">Tambah</span>
                        </button>
                    </div>
                    @endforeach
                @endif
                
            </div>
            <div class="form-group">
                <label for="pelatihan">Pelatihan yang pernah diikuti</label>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="pelatihan_pmi">Pelatihan PMI</label>
                        <input type="text" name="pelatihan_pmi" id="pelatihan" class="form-control form-control-sm" value="{{ $anggota->pelatihan_pmi }}">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="pelatihan_luar">Pelatihan diluar PMI</label>
                        <input type="text" name="pelatihan_luar" id="pelatihanLuar" class="form-control form-control-sm" value="{{ $anggota->pelatihan_luar }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="spesialisasi">Spesialisasi yang dimiliki</label>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="spesialisasi_pmi">Spesialisasi PMI</label>
                        <input type="text" name="spesialisasi_pmi" id="spesialisasi" class="form-control form-control-sm" value="{{ $anggota->spesialisasi_pmi }}">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="spesialisasi_luar">Spesialisasi diluar PMI</label>
                        <input type="text" name="spesialisasi_luar" id="spesialisasiLuar" class="form-control form-control-sm" value="{{ $anggota->spesialisasi_luar }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pengalaman">Pengalaman Kerja</label>
                <input type="text" name="pengalaman" id="pengalaman" class="form-control form-control-sm" value="{{ $anggota->pengalaman_kerja }}">
            </div>
            <div class="form-group">
                <label for="bahasa">Kemampuan Bahasa Asing</label>
                <input type="text" name="bahasa" id="bahasa" class="form-control form-control-sm" value="{{ $anggota->bahasa }}">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="bakat">Bakat</label> <br>
                    <input type="text" name="bakat" value="{{ $anggota->bakat }}" id="bakat" class="form-control form-control-sm">
                </div>
                <div class="col-sm-6">
                    <label for="cita">Cita-Cita</label> <br>
                    <input type="text" name="cita" id="cita" class="form-control form-control-sm" id="cita" value="{{ $anggota->cita_cita }}"> 
                </div>
            </div>
            <div class="form-group">
                <label for="motto">Motto Hidup</label>
                <textarea name="motto" id="motto" class="form-control form-control-sm">{{ $anggota->motto }}</textarea>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('anggota.edit') }}" class="btn btn-danger pull-right">
                    Kembali
                </a>
                <input type="submit" value="Selanjutnya" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
    
@endsection