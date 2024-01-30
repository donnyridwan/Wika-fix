<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <div class="w-full">
        <div class="h-20 flex justify-between px-6 md:px-16 bg-white">
            <p class="font-bold text-2xl my-auto">Logo</p>
            <div class="my-auto flex justify">
                <button class="mr-6">
                    <img src="{{ asset('assets/shopping-cart.svg') }}" alt="" class="h-6 w-6">
                </button>
                <button class=" bg-themeBlue text-white py-2 px-6">
                    Logout
                </button>
            </div>
        </div>

        <div class="min-h-[760px] w-full flex justify-center items-center py-16"
            style="background-image: url('{{ asset('assets/landing.jpg') }}');
            background-position: 0 25%;
            background-size:cover;
            backdrop-filter:invert(1)">
            <div class="flex flex-col items-center px-24">
                <h1 class="text-white font-bold text-5xl md:text-6xl xl:text-8xl mb-4 text-center">Wika Tours and Travel</h1>
                <p class="text-white text-xl md:text-2xl xl:text-3xl mb-10 text-center">Kami Menyediakan Layanan Perjalanan Terbaik Untukmu</p>

                <form action="{{ route('landing.scrape') }}" method="post" class="flex py-10 px-8 bg-white rounded-3xl gap-10 justify-between flex-wrap">
                    @csrf
                    <div class="flex flex-col min-w-[180px]">
                        <label for="departure" class="ml-1">Keberangkatan</label>
                        <select class="cursor-pointer font-bold text-2xl" aria-label="Default select example" id="departure" name="departure">
                            <option selected>Semarang</option>
                            <option value="&airlines=GA">Jakarta</option>
                            <option value="user">Ambon</option>
                        </select>
                    </div>
        
                    <div class="flex flex-col min-w-[180px]">
                        <label for="destination" class="ml-1">Tujuan</label>
                        <select class="cursor-pointer font-bold text-2xl" aria-label="Default select example" id="destination" name="destination">
                            <option selected>Semarang</option>
                            <option value="&airlines=GA">Jakarta</option>
                            <option value="user">Ambon</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" class="cursor-pointer font-bold text-2xl w-44" id="datepicker" name="tanggal" required placeholder="pilih tanggal">
                    </div>

                    <div class="flex flex-col min-w-[180px]">
                        <label for="airline" class="ml-1">Maskapai</label>
                        <select class="cursor-pointer font-bold text-2xl" aria-label="Default select example" id="airline" name="airline">
                            <option selected>Semua</option>
                            <option value="&airlines=GA">Garuda</option>
                            <option value="user">user</option>
                        </select>
                    </div>

                    <div class="flex flex-col min-w-[180px]">
                        <label for="kelas" class="ml-1">Kelas</label>
                        <select class="cursor-pointer font-bold text-2xl" aria-label="Default select example" id="kelas" name="kelas">
                            <option selected>Ekonomi</option>
                            <option value="&airlines=GA">Bisnis</option>
                            <option value="user">Eksekutif</option>
                        </select>
                    </div>
        
                    <!-- Tambahkan input atau elemen form lainnya sesuai kebutuhan -->
        
                    <button type="submit" class="bg-themeBlue text-white px-10 rounded-xl min-h-12 mx-auto md:mx-0">Cari</button>
                </form>
            </div>
        </div>

        <footer class="py-20 px-16 xl:px-28">
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
