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

        @if(isset($selectedResult))
            <div class="card">
                <p>ID: {{ $selectedResult['id'] }}</p>
                <p>Maskapai: {{ $selectedResult['maskapai'] }}</p>
                <p>Harga: {{ $selectedResult['harga'] }}</p>
                <p>Jam Berangkat: {{ $selectedResult['jamBerangkat'] }}</p>
                <p>Jam Tiba: {{ $selectedResult['jamTiba'] }}</p>
            </div>
        @else
            <p>Data tidak ditemukan.</p>
        @endif
    </div>
</body>
</html>