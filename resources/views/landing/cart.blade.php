@extends('landing.layout')

@section('content')
    <h4 class="mt-5">keranjang Tiket</h4>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif

    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>Maskapai</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
                <th>Jam Berangkat</th>
                <th>Jam Tiba</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Kode Tiket</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($keranjangs as $key => $keranjang)
                <tr>
                    {{-- <td>{{ $key + 1 }}</td> --}}
                    {{-- <td>{{ $keranjang->pemesan }}</td> --}}
                    <td>{{ $keranjang->maskapai }}</td>
                    <td>{{ $keranjang->Kota_asal }}</td>
                    <td>{{ $keranjang->Kota_Tujuan }}</td>
                    <td>{{ $keranjang->jam_berangkat }}</td>
                    <td>{{ $keranjang->jam_tiba }}</td>
                    <td>{{ $keranjang->status }}</td>
                    <td>{{ $keranjang->tanggal }}</td>
                    <td>{{ $keranjang->kode_tiket }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
