@extends('user.layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

        <h5 class="mb-4 font-bold text-2xl">Tambah Pengguna</h5>

        <form method="post" action="{{route('user.store') }}">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label font-bold">nama</label>
                <input type="text" class="form-control" id="nama" name="nama" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label font-bold">email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label font-bold">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label font-bold">role</label>
                <select class="form-select" aria-label="Default select example" id="role" name="role">
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="perusahaan" class="form-label font-bold">perusahaan</label>
                <input type="text" class="form-control" id="perusahaan" name="perusahaan">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary bg-themeBlue/80 border" value="Tambah" />
            </div>
        </form>
@stop