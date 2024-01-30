@extends('layouts.base')

@section('content')
<h1>{{ $title }}</h1>
<div class="col-md-6 col-12">
    @error('general_errors')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <form action="{{ $action }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ empty(old('name')) ? (isset($user) ? $user->name : '') : old('name') }}">
                    @error('name')
                        <i class="small text-danger">{{ $message }}</i>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ empty(old('email')) ? (isset($user) ? $user->email : '') : old('email') }}">
                    @error('email')
                        <i class="small text-danger">{{ $message }}</i>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ empty(old('username')) ? (isset($user) ? $user->username : '') : old('username') }}">
                    @error('username')
                        <i class="small text-danger">{{ $message }}</i>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" {{ isset($user) ? 'disabled' : '' }}>
                            @error('password')
                                <i class="small text-danger">{{ $message }}</i>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="">Konfirmasi Password</label>
                            <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Konfirmasi Password" {{ isset($user) ? 'disabled' : '' }}>
                            @error('confirm_password')
                                <i class="small text-danger">{{ $message }}</i>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <a href="{{ route('users') }}" class="btn btn-danger">Batal</a>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection