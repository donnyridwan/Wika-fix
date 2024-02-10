<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
    </style>
    @vite('resources/css/app.css')

</head>

<body class="p-10 flex justify-center">
    <div class="container bg-white rounded-xl p-10 max-w-5xl">
        <p class="font-bold text-3xl mb-6">Detail Tiket</p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('landing.tambah') }}" class="flex flex-col w-full">
            @csrf
            @if (isset($selectedResult))
            <div class="flex w-full md:gap-8 flex-wrap">
                <div class="grow">
                    <div class="mb-3 flex flex-col gap-4">
                        <label for="pemesan" class="form-label font-bold">pemesan</label>
                        <input type="text" class="form-control border p-2" id="pemesan" name="pemesan"
                            value="{{$pemesan}}">
                    </div>
                    <div class="mb-3 flex flex-col gap-4">
                        <label for="Kota_asal" class="form-label font-bold">Kota_Asal</label>
                        <input type="text" class="form-control border p-2" id="Kota_asal" name="Kota_asal"
                            value="{{$selectedResult['asal']}}">
                    </div>
                    <div class="mb-3 flex flex-col gap-4">
                        <label for="jam_berangkat" class="form-label font-bold">jam_berangkat</label>
                        <input type="text" class="form-control border p-2" id="jam_berangkat" name="jam_berangkat"
                            value="{{$selectedResult['jamBerangkat']}}">
                    </div>
                    <div class="mb-3 flex flex-col gap-4">
                        <label for="tanggal_berangkat" class="form-label font-bold">tanggal_berangkat</label>
                        <input type="text" class="form-control border p-2" id="tanggal_berangkat"
                            name="tanggal_berangkat" value="{{$tanggal}}">
                    </div>
                </div>

                <div class="grow">
                    <div class="mb-3 flex flex-col gap-4">
                        <label for="maskapai" class="form-label font-bold">maskapai</label>
                        <input type="text" class="form-control border p-2" id="maskapai" name="maskapai"
                            value="{{$selectedResult['maskapai']}}">
                    </div>
                    <div class="mb-3 flex flex-col gap-4">
                        <label for="Kota_Tujuan" class="form-label font-bold">Kota_Tujuan</label>
                        <input type="text" class="form-control border p-2" id="Kota_Tujuan" name="Kota_Tujuan"
                            value="{{$selectedResult['tujuan']}}">
                    </div>
                    <div class="mb-3 flex flex-col gap-4">
                        <label for="jam_tiba" class="form-label font-bold">jam_tiba</label>
                        <input type="text" class="form-control border p-2" id="jam_tiba" name="jam_tiba"
                            value="{{$selectedResult['jamTiba']}}">
                    </div>
                    <div class="mb-3 flex flex-col gap-4">
                        <label for="harga" class="form-label font-bold">harga</label>
                        <input type="text" class="form-control border p-2" id="harga" name="harga"
                            value="{{$selectedResult['harga']}}">
                    </div>
                </div>
            </div>

            <div id="form-container-penumpang" class="">
                <p class="font-bold text-3xl mb-6 mt-8">Penumpang</p>
                <div class="mb-3 flex gap-4 border p-6">
                    <div class="flex flex-col w-24">
                        <label class="font-bold mb-2" for="Tittle-1">Status</label>
                        <input type="text" class="form-control p-2 border" id="Tittle-1" name="tittle[]" required
                            placeholder="Tuan">
                    </div>
                    <div class="flex flex-col grow">
                        <label class="font-bold mb-2" for="Nama-1">Nama</label>
                        <input type="text" class="form-control p-2 border" id="Nama-1" name="nama[]" required
                            placeholder="Masukkan nama Sesuai KTP">
                    </div>
                    <div class="flex flex-col grow">
                        <label class="font-bold mb-2" for="Nik-1">Nik</label>
                        <input type="text" class="form-control p-2 border" id="Nik-1" name="nik[]" required
                            placeholder="Masukkan NIK sesuai KTP">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary mb-8 flex items-center gap-4" id="btn-add">
                <div class="h-0 border grow">

                </div>
                <div class="bg-themeBlue text-white px-3.5 py-1 rounded-full text-3xl">
                    +
                </div>
                <div class="h-0 border grow">

                </div>
            </button>
            <div class="text-center bg-themeBlue text-white p-4 font-bold">
                <input type="submit" class="btn btn-primary" value="Buat Pesanan" />
            </div>
            @else
                <p>Data tidak ditemukan.</p>
            @endif
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var formCount = 1;

            var btnRemove = "";


            function addForm() {
                formCount++;

                var formContainer = document.getElementById("form-container-penumpang");
                var newForm = document.createElement("div");
                newForm.innerHTML = `
            <div class="form-container-pemesan mb-3 flex gap-4 border p-6" id="myform-${formCount}">
                <div class="flex flex-col w-24">
                    <label class="font-bold mb-2" for="Tittle-${formCount}">Status</label>
                    <input type="text" class="form-control p-2 border" id="Tittle-${formCount}" name="tittle[]" required
                        placeholder="Tuan">
                </div>
                <div class="flex flex-col grow">
                    <label class="font-bold mb-2" for="Nama-${formCount}">Nama</label>
                    <input type="text" class="form-control p-2 border" id="Nama-${formCount}" name="nama[]" required
                        placeholder="Masukkan nama Sesuai KTP">
                </div>
                <div class="flex flex-col grow">
                    <label class="font-bold mb-2" for="Nik-${formCount}">Nik</label>
                    <input type="text" class="form-control p-2 border" id="Nik-${formCount}" name="nik[]" required
                        placeholder="Masukkan NIK sesuai KTP">
                </div>
                <button type="button" class="btn btn-danger btn-remove bg-red-600 h-10 self-end px-4 text-white" data-remove="${formCount}">Hapus</button>
            </div>
        `;

                formContainer.appendChild(newForm);

                btnRemove = document.getElementsByClassName("btn-remove");
                console.log('btn-remove', btnRemove)
                for (var i = 0; i < btnRemove.length; i++) {
                    btnRemove[i].addEventListener('click', removeFunction, false);
                }
            }

            var removeFunction = function() {
                var attribute = this.getAttribute("data-remove");
                var formToRemove = document.getElementById(`myform-${attribute}`);
                if (formToRemove) {
                    formToRemove.remove();
                }
            };



            document.getElementById("btn-add").addEventListener("click", addForm);
        });
    </script>
</body>

</html>
