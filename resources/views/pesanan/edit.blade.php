@extends('pesanan.layout')
@section('content')

    <h4 class="font-bold text-4xl mb-4">Data Pesanan</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row gx-5 gy-3" method="post" action="{{ route('pesanan.update', $pesanan->id_pesanan) }}">
        @csrf
        <div class="col-md-6">
            <label for="pemesan" class="form-label font-bold">pemesan</label>
            <input type="text" class="form-control form-control-lg" id="pemesan" name="pemesan"
                value="{{ $pesanan->pemesan }}">
        </div>
        <div class="col-md-6">
            <label for="maskapai" class="form-label font-bold">Maskapai</label>
            <input type="text" class="form-control form-control-lg" id="maskapai" name="maskapai"
                value="{{ $pesanan->maskapai }}">
        </div>
        <div class="col-md-6">
            <label for="Kota_asal" class="form-label font-bold">Kota Asal</label>
            <input type="text" class="form-control form-control-lg" id="Kota_asal" name="Kota_asal"
                value="{{ $pesanan->Kota_asal }}">
        </div>
        <div class="col-md-6">
            <label for="Kota_Tujuan" class="form-label font-bold">Kota Tujuan</label>
            <input type="text" class="form-control form-control-lg" id="Kota_Tujuan" name="Kota_Tujuan"
                value="{{ $pesanan->Kota_Tujuan }}">
        </div>
        <div class="col-md-6">
            <label for="jam_berangkat" class="form-label font-bold">jam Berangkat</label>
            <input type="text" class="form-control form-control-lg" id="jam_berangkat" name="jam_berangkat"
                value="{{ $pesanan->jam_berangkat }}">
        </div>
        <div class="col-md-6">
            <label for="jam_tiba" class="form-label font-bold">jam Tiba</label>
            <input type="text" class="form-control form-control-lg" id="jam_tiba" name="jam_tiba"
                value="{{ $pesanan->jam_tiba }}">
        </div>
        <div class="col-md-6">
            <label for="harga" class="form-label font-bold">Harga</label>
            <input type="text" class="form-control form-control-lg" id="harga" name="harga"
                value="{{ $pesanan->harga }}">
        </div>
        <div class="col-md-6">
            <label for="kode_tiket" class="form-label font-bold">Tanggal</label>
            <input type="text" class="form-control form-control-lg" id="kode_tiket" name="kode_tiket"
                value="{{ $pesanan->tanggal }}">
        </div>
        <div class="col-12">
            <label for="penumpang" class="form-label font-bold">Kode tiket</label>
            <input type="text" class="form-control form-control-lg" id="penumpang" name="perusahaan"
                value="{{ $pesanan->kode_tiket }}">
        </div>
        <div class="col-12 mb-4">
            <label for="penumpang" class="form-label font-bold">Penumpang</label>
            <input type="text" class="form-control form-control-lg" id="penumpang" name="perusahaan"
                value="{{ $pesanan->penumpang }}">
        </div>
        <div class="row pl-9">
            <input type="submit" class="bg-themeBlue/60 text-white py-2 rounded-lg" value="Terima" />
        </div>
    </form>
    <form method="post" action="{{ route('pesanan.tolak', $pesanan->id_pesanan) }}" class="mt-4">
        @csrf
        <button type="submit" class="bg-red-600/60 text-white py-2 rounded-lg w-full">Tolak</button>
    </form>

@stop