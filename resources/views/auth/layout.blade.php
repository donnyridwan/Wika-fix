<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
    <!-- Tambahkan link Bootstrap CSS di sini -->
</head>
<body>
    <div id="app" class="h-[100svh] w-[100svw] flex flex-col items-center justify-start">
        <div class="w-full px-16 py-5">
            <p class="font-bold text-2xl">WikaTours</p>
        </div>
        <div class="flex items-center justify-center grow">
            @yield('content')
        </div>
    </div>

    <!-- Tambahkan script Bootstrap JS dan script lainnya di sini -->
</body>
</html>
