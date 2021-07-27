@extends('layouts.frontend.main')
@section('title')
    Home
@endsection
@section('content')
    <h1 class="mt-4">Biodata</h1>
    <ul>
        <li>{{ $biodata->nama_lengkap }}</li>
        <li>{{ $biodata->nama_panggilan }}</li>
        <li>{{ $biodata->tempat_lahir }}</li>
        <li>{{ $biodata->tanggal_lahir }}</li>
        <li>{{ $biodata->agama }}</li>
        <li>{{ $biodata->golongan_darah }}</li>
    </ul> 
@endsection