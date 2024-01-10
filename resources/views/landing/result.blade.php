<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .card h3 {
            margin: 0;
            font-size: 18px;
        }
        .btn-primary {
            display: inline-block;
            padding: 8px 16px;
            margin-top: 10px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hasil Scraping</h2>
        
        @if(isset($response) && count($response) > 0)
            @foreach($response as $result)
                <div class="card">
                    <h3>ID: {{ $result['id'] }}</h3>
                    <h3>Maskapai: {{ $result['maskapai'] }}</h3>
                    <h3>Harga: {{ $result['harga'] }}</h3>
                    <h3>Jam Berangkat: {{ $result['jamBerangkat'] }}</h3>
                    <h3>Jam Tiba: {{ $result['jamTiba'] }}</h3>
                    <a href="{{ route('landing.detail', ['id' => $result['id']]) }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            @endforeach
        @else
            <p>Data tidak tersedia.</p>
        @endif
    </div>
</body>
</html>
