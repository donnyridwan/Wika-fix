@extends('user.layout')
@section('content')
<h4 class="mt-5">Data Petugas</h4>
<a href="{{ route('user.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

    @if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-3">
    <thead>
        <tr>
            <th>No</th>
            {{-- <th>Id Petugas</th> --}}
            <th>Nama Petugas</th>
            <th>Email</th>
            <th>Role</th>
            <th>Perusahaan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $key => $user)

        <tr>
            <td>{{ $key+1 }}</td>
            {{-- <td>{{ $user->id_user}}</td> --}}
            <td>{{ $user->nama}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->role}}</td>
            <td>{{ $user->perusahaan}}</td>
            <td>
                <a href="{{ route('user.edit',$user->id_user) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAHBARIS INI -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $user->id_user }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $user->id_user }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('user.delete', $user->id_user) }}">
                        @csrf
                        <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop