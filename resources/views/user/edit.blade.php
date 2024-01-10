@extends('user.layout')
@section('content')

<h4 class="mt-5">Data Peminjam</h4>
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Ubah Data Peminjam</h5>
        <form method="post" action="{{route('user.update', $data->id_user) }}">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{ $data->password }}">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">role</label>
                <select class="form-select" aria-label="Default select example" id="role" name="role">
                    <option value="admin" {{ $data->role == 'admin' ? 'selected' : '' }}>admin</option>
                    <option value="user" {{ $data->role == 'user' ? 'selected' : '' }}>user</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="perusahaan" class="form-label">perusahaan</label>
                <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="{{ $data->perusahaan }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop