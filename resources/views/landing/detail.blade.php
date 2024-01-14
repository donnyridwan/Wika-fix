<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Detail Scraping</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('landing.tambah') }}">
            @csrf
            @if (isset($selectedResult))
                {{-- <div class="card">
                <p>ID: {{ $selectedResult['id'] }}</p>
                <p>Maskapai: {{ $selectedResult['maskapai'] }}</p>
                <p>Harga: {{ $selectedResult['harga'] }}</p>
                <p>Jam Berangkat: {{ $selectedResult['jamBerangkat'] }}</p>
                <p>Jam Tiba: {{ $selectedResult['jamTiba'] }}</p>
            </div> --}}
                <div class="mb-3">
                    <label for="Kota_asal" class="form-label">Kota_Asal</label>
                    <input type="text" class="form-control" id="Kota_asal" name="Kota_asal" value="{{ $selectedResult['asal'] }}">
                </div>
                <div class="mb-3">
                    <label for="Kota_Tujuan" class="form-label">Kota_Tujuan</label>
                    <input type="text" class="form-control" id="Kota_Tujuan" name="Kota_Tujuan" value="{{ $selectedResult['tujuan'] }}">
                </div>
                <div class="mb-3">
                    <label for="jam_berangkat" class="form-label">jam_berangkat</label>
                    <input type="text" class="form-control" id="jam_berangkat" name="jam_berangkat"
                        value="{{ $selectedResult['jamBerangkat'] }}">
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="jam_tiba" class="form-label">jam_tiba</label>
                        <input type="text" class="form-control" id="jam_tiba" name="jam_tiba"
                            value="{{ $selectedResult['jamTiba'] }}">
                    </div>
                    <label for="maskapai" class="form-label">maskapai</label>
                    <input type="text" class="form-control" id="maskapai" name="maskapai"
                        value="{{ $selectedResult['maskapai'] }}">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">harga</label>
                    <input type="text" class="form-control" id="harga" name="harga"
                        value="{{ $selectedResult['harga'] }}">
                </div>
                <div class="mb-3">
                    <label for="pemesan" class="form-label">pemesan</label>
                    <input type="text" class="form-control" id="pemesan" name="pemesan">
                </div>
                <div class="mb-3">
                    <label for="penumpang" class="form-label">penumpang</label>
                    <input type="text" class="form-control" id="penumpang" name="penumpang">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Ubah" />
                </div>
            @else
                <p>Data tidak ditemukan.</p>
            @endif
    </div>
</body>

</html>
