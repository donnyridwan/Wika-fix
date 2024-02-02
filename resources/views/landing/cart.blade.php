@extends('landing.layout')

@section('content')
    <h4 class="mt-5">Data Petugas</h4>

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
                {{-- <th>Tujuan</th>
                <th>Status</th>
                <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($keranjangs as $key => $keranjang)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $keranjang->pemesan }}</td>
                    <td>{{ $keranjang->Kota_asal }}</td>
                    <td>{{ $keranjang->Kota_Tujuan }}</td>
                    {{-- <td>
                        @if ($keranjang->status == 'proses')
                            <button type="button" class="btn btn-primary btn-sm">{{ $keranjang->status }}</button>
                        @elseif($keranjang->status == 'selesai')
                            <button type="button" class="btn btn-success btn-sm">{{ $keranjang->status }}</button>
                        @elseif($keranjang->status == 'gagal')
                            <button type="button" class="btn btn-danger btn-sm">{{ $keranjang->status }}</button>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pesanan.edit', $keranjang->id_pesanan) }}" type="button"
                            class="btn btn-warning rounded-3">Urus</a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
