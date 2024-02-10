{{-- <!DOCTYPE html>
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
        
        @if (isset($response) && count($response) > 0)
            @foreach ($response as $result)
                <div class="card"> --}}
{{-- <h3>ID: {{ $result['id'] }}</h3> --}}
{{-- <h3>Maskapai: {{ $result['maskapai'] }}</h3>
                    <h3>Harga: {{ $result['harga'] }}</h3>
                    <h3>Jam Berangkat: {{ $result['jamBerangkat'] }}</h3>
                    <h3>Jam Tiba: {{ $result['jamTiba'] }}</h3>
                    <h3>Kota Asal: {{ $result['asal'] }}</h3>
                    <h3>Kota Tujuan: {{ $result['tujuan'] }}</h3>
                    <a href="{{ route('landing.detail', ['id' => $result['id']]) }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            @endforeach
        @else
            <p>Data tidak tersedia.</p>
        @endif
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Penerbangan</title>
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
    @vite('resources/css/app.css')
</head>

<body>
    <div class="w-full">
        <div class="h-20 flex justify-between px-6 md:px-16 bg-white">
            <p class="font-bold text-2xl my-auto">Logo</p>
            <div class="my-auto flex justify">
                <form action="{{ route('landing.cart') }}">
                    <button class="mr-6">
                        <img src="{{ asset('assets/shopping-cart.svg') }}" alt="" class="h-6 w-6">
                    </button>
                </form>
                <form action="{{ route('logout') }}" class=" bg-themeBlue text-white py-2 px-6" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
        <div class="container flex flex-col items-center max-w-5xl px-10">
            <h1 class="font-bold text-3xl mb-8 mt-4">Jadwal Penerbangan</h1>
            @if (isset($response) && count($response) > 0)
                @foreach ($response as $result)
                    <div class="card flex items-center justify-between w-full px-12">

                        <div class="flex flex-col items-center gap-3">
                            <p class="font-bold text-sm">{{ $result['maskapai'] }}</p>
                            <div class="flex items-center text-2xl font-bold">
                                <p class="">{{ $result['asal'] }}</p>
                                <svg width="48" height="10" viewBox="0 0 48 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M36.5634 5.3871C36.7772 5.17331 36.7772 4.82669 36.5634 4.6129L33.0795 1.12904C32.8657 0.915257 32.5191 0.915257 32.3053 1.12904C32.0915 1.34283 32.0915 1.68945 32.3053 1.90323L35.4021 5L32.3053 8.09677C32.0915 8.31055 32.0915 8.65717 32.3053 8.87096C32.5191 9.08474 32.8657 9.08474 33.0795 8.87096L36.5634 5.3871ZM11.0737 5.54744H12.6426V4.45256H11.0737V5.54744ZM15.7804 5.54744H18.9183V4.45256H15.7804V5.54744ZM22.0561 5.54744H25.1939V4.45256H22.0561V5.54744ZM28.3317 5.54744H31.4696V4.45256H28.3317V5.54744ZM34.6074 5.54744H36.1763V4.45256H34.6074V5.54744Z"
                                        fill="black" />
                                </svg>
                                <p class="">{{ $result['tujuan'] }}</p>
                            </div>
                            <p class="font-bold">{{$tanggal}}</p>
                        </div>

                        <p class="flex flex-col items-center">
                            <span class="text-sm">Berangkat</span>
                            <span class="font-bold text-2xl">{{ $result['jamBerangkat'] }}</span>
                        </p>
                        <p class="flex flex-col items-center">
                            <span class="text-sm">Sampai</span>
                            <span class="font-bold text-2xl">{{ $result['jamTiba'] }}</span>
                        </p>

                        <div class="flex flex-col items-center">
                            <p class="font-bold text-2xl">{{ $result['harga'] }}</p>
                            <a href="{{ route('landing.detail', ['id' => $result['id']]) }}"
                                class="btn btn-primary">Book Now</a>
                        </div>

                    </div>
                @endforeach
            @else
                <p>Data tidak tersedia.</p>
            @endif
        </div>
        <footer class="py-20 px-16 xl:px-28 bg-white">
            <div class="flex md:mb-20 flex-col md:flex-row justify-between w-full">
                <div>
                    <p class="text-2xl font-bold mb-8">Logo</p>
                    <p class="font-bold">Address:</p>
                    <p class="mb-6">Level 1, 12 Sample St, Sydney NSW 2000</p>
                    <p class="font-bold">Contact:</p>
                    <a href="tel:1800 123 4567" class="underline block">1800 123 4567</a>
                    <a href="mailto:info@relume.io" class="underline">info@relume.io</a>

                    <div class="flex gap-3 mt-6 mb-6 md:mb-0">
                        <a href="#">
                            <img src="{{asset('assets/Facebook.svg')}}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{asset('assets/Instagram.svg')}}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{asset('assets/X.svg')}}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{asset('assets/LinkedIn.svg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="flex mb-6 md:mb-0">
                    <div class="mr-16 md:mr-24">
                        <a href="#" class="block mb-6">About Us</a>
                        <a href="#" class="block mb-6">Careers</a>
                        <a href="#" class="block mb-6">Contact Us</a>
                        <a href="#" class="block mb-6">Blog</a>
                    </div>
                    <div class="md:mr-24">
                        <a href="#" class="block mb-6">Features</a>
                        <a href="#" class="block mb-6">Pricing</a>
                        <a href="#" class="block mb-6">Security</a>
                        <a href="#" class="block mb-6">Integrations</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full">
                <div class="w-full border border-t-black mb-8"></div>
                <div class="flex justify-between">
                    <p>© 2023 Relume. All rights reserved.</p>
                    <div class="flex underline">
                        <a href="#" class="mr-4">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
