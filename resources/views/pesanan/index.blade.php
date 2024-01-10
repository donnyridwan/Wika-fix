@extends('pesanan.layout')
@section('content')
    <h4 class="mt-5">
        Data Petugas</h4>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Berangkat</th>
                <th>Tujuan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanans as $key => $pesanan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    {{-- <td>{{ $user->id_user}}</td> --}}
                    <td>{{ $pesanan->pemesan }}</td>
                    <td>{{ $pesanan->Kota_asal }}</td>
                    <td>{{ $pesanan->Kota_Tujuan }}</td>
                    <td>
                        @if ($pesanan->status == 'proses')
                            <button type="button" class="btn btn-primary btn-sm">{{ $pesanan->status }}</button>
                        @elseif($pesanan->status == 'selesai')
                            <button type="button" class="btn btn-success btn-sm">{{ $pesanan->status }}</button>
                        @elseif($pesanan->status == 'gagal')
                            <button type="button" class="btn btn-danger btn-sm">{{ $pesanan->status }}</button>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pesanan.edit', $pesanan->id_pesanan) }}" type="button"
                            class="btn btn-warning rounded-3">Urus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
