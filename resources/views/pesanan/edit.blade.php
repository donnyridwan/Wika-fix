@extends('pesanan.layout')
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
        <form class="row gx-5 gy-3" method="post" action="{{route('pesanan.update', $pesanan->id_pesanan) }}">
            @csrf
            <div class="col-md-6">
                <label for="Kota_asal" class="form-label">Kota Asal</label>
                <input type="text" class="form-control form-control-lg" id="Kota_asal" name="Kota_asal" value="{{ $pesanan->Kota_asal}}">
            </div>
            <div class="col-md-6">
                <label for="Kota_Tujuan" class="form-label">Kota Tujuan</label>
                <input type="text" class="form-control form-control-lg" id="Kota_Tujuan" name="Kota_Tujuan" value="{{ $pesanan->Kota_Tujuan }}">
            </div>
            <div class="col-md-6">
                <label for="jam_berangkat" class="form-label">jam Berangkat</label>
                <input type="text" class="form-control form-control-lg" id="jam_berangkat" name="jam_berangkat" value="{{ $pesanan->jam_berangkat }}">
            </div>
            <div class="col-md-6">
                <label for="jam_tiba" class="form-label">jam Tiba</label>
                <input type="text" class="form-control form-control-lg" id="jam_tiba" name="jam_tiba" value="{{ $pesanan->jam_tiba }}">
            </div>
            <div class="col-md-6">
                <label for="maskapai" class="form-label">Maskapai</label>
                <input type="text" class="form-control form-control-lg" id="maskapai" name="maskapai" value="{{ $pesanan->maskapai }}">
            </div>
            <div class="col-md-6">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control form-control-lg" id="harga" name="harga" value="{{ $pesanan->harga }}">
            </div>
            <div class="col-md-6">
                <label for="kode_tiket" class="form-label">Kode Tiket</label>
                <input type="text" class="form-control form-control-lg" id="kode_tiket" name="kode_tiket" value="{{ $pesanan->kode_tiket }}">
            </div>
            <div class="col-md-6">
                <label for="pemesan" class="form-label">pemesan</label>
                <input type="text" class="form-control form-control-lg" id="pemesan" name="pemesan" value="{{ $pesanan->pemesan }}">
            </div>
            <div class="col-12">
                <label for="penumpang" class="form-label">Penumpang</label>
                <input type="text" class="form-control form-control-lg" id="penumpang" name="perusahaan" value="{{ $pesanan->penumpang }}">
            </div>
            <div class="row gx-3">
                <div class="col text-center">
                    <input type="submit" class="btn btn-primary" value="Terima" />
                </div>
            </div>            
        </form>
        <form method="post" action="{{ route('pesanan.tolak', $pesanan->id_pesanan) }}">
            @csrf
            <button type="submit" class="btn btn-secondary">Tolak</button>
        </form>
    </div>
</div>
@stop