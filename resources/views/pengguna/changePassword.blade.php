@extends('layouts.backend.main')
@section('title')
    Ganti Password
@endsection

@section('content')
<h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="p-5">
                        <form action="{{ route('anggota.change.password.post') }}" class="user" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="password" name="oldpass" id="oldpass" placeholder="Old Password" class="form-control form-control-user">
                            </div>
                            <div class="form-group">
                                <input type="password" name="newpass" id="newpass" placeholder="New Password" class="form-control form-control-user">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confpass" id="confpass" placeholder="Confirm Password" class="form-control form-control-user">
                            </div>
                            <input type="submit" value="Kirim" class="btn btn-primary btn-user btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection