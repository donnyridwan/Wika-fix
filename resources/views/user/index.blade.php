@extends('user.layout')
@section('content')
<h1 class="text-4xl font-bold mb-10">
    List Pengguna</h1>
<a href="{{ route('user.create') }}" type="button" class="py-2 px-4 bg-green-600/70 text-white rounded-lg mb-4">Tambah Data</a>

    @if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<div class="rounded-lg overflow-x-hidden overflow-y-scroll max-h-96 no-scrollbar mb-24 w-10/12 md:w-auto">
    <table class="w-full text-left h-12 text-sm md:text-base">
        <thead class="bg-[#cdeaff] sticky top-0">
            <tr>
                <th class="p-3">No</th>
                {{-- <th class="p-3">Id Petugas</th> --}}
                <th class="p-3">Nama Petugas</th>
                <th class="p-3">Email</th>
                <th class="p-3">Role</th>
                <th class="p-3">Perusahaan</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $key => $user)
    
            <tr>
                <td class="p-3 border-b">{{ $key+1 }}</td>
                {{-- <td class="p-3 border-b">{{ $user->id_user}}</td> --}}
                <td class="p-3 border-b">{{ $user->nama}}</td>
                <td class="p-3 border-b">{{ $user->email}}</td>
                <td class="p-3 border-b">{{ $user->role}}</td>
                <td class="p-3 border-b">{{ $user->perusahaan}}</td>
                <td class="p-3 border-b">
                    <a href="{{ route('user.edit',$user->id_user) }}" type="button" class="btn btn-warning rounded-3 bg-yellow-500/60 text-white">Ubah</a>
                    <!-- TAMBAHKAN KODE DELETE DIBAWAHBARIS INI -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger bg-red-600/60" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $user->id_user }}">
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
                            <button type="button" class="btn btn-secondary bg-gray-600" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary bg-blue-600/60">Ya</button>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop