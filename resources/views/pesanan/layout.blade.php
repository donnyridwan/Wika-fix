<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Data Pelanggan</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-[#F7F9FC]">

    <nav class="navbar bg-themeBlue h-20 flex justify-between items-center px-16">
        <div class="text-white font-bold text-2xl">
            Wika Tours and Travel
        </div>
        <img src="https://api.dicebear.com/7.x/micah/svg?flip=true&size=44&backgroundColor=b6e3f4,c0aede&seed=felix&scale=75&translateY=10"
            alt="avatar" class="rounded-full">
    </nav>
    <div class="flex h-[calc(100svh-80px)] ">
        <div class="w-72 min-w-72 bg-white h-full py-8 px-4 flex flex-col font-bold gap-3">
            <p class="text-sm font-thin text-themeGray mb-2">User Panel</p>
            
            <a href="{{ route('pesanan.index') }}">
                <div class="h-10 flex items-center py-4 px-4 gap-2.5 cursor-pointer ml-4 bg-blue-100 rounded-lg">
                    <img src="{{ asset('assets/group.svg') }}" alt="users icon">
                    <p class=" text-sm  ">
                        Data Pesanan</p>
                </div>
            </a>
            
            <a href="{{ route('user.index') }}">
                <div class="h-10 flex items-center py-4 px-4 gap-2.5 hover:bg-blue-100 rounded-lg cursor-pointer">
                    <img src="{{ asset('assets/article.svg') }}" alt="users icon" class="stroke-black">
                    <p class=" text-sm ">
                        Data Pelanggan</p>
                </div>
            </a>

            <form action="{{ route('logout') }}" class="mt-auto flex items-center py-2 px-2 gap-2 font-thin" method="POST">
                @csrf
                <img src="{{ asset('assets/logoutIcon.svg') }}" alt="">
                <button type="submit" class= "text-themeGray rounded-3xl">Logout</button>
            </form>
        </div>
        <div class="p-10 grow">
            <div class="bg-white w-full h-full p-10 rounded overflow-scroll no-scrollbar">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>