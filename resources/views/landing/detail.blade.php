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
                <div class="mb-3">
                    <label for="Kota_asal" class="form-label">Kota_Asal</label>
                    <input type="text" class="form-control" id="Kota_asal" name="Kota_asal"
                        value="{{ $selectedResult['asal'] }}">
                </div>
                <div class="mb-3">
                    <label for="Kota_Tujuan" class="form-label">Kota_Tujuan</label>
                    <input type="text" class="form-control" id="Kota_Tujuan" name="Kota_Tujuan"
                        value="{{ $selectedResult['tujuan'] }}">
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
            <input type="text" class="form-control" id="pemesan" name="pemesan" value="{{ $pemesan }}">
                </div>
                <div id="form-container-penumpang">
                    <div class="mb-3">
                        <label for="Tittle-1">Tittle</label>
                        <input type="text" class="form-control" id="Tittle-1" name="tittle[]" required>
                        <label for="Nama-1">Nama</label>
                        <input type="text" class="form-control" id="Nama-1" name="nama[]" required>
                        <label for="Nik-1">Nik</label>
                        <input type="text" class="form-control" id="Nik-1" name="nik[]" required>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="btn-add">Add</button>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Kirim" />
                </div>
            @else
                <p>Data tidak ditemukan.</p>
            @endif
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
            <div class="form-container-pemesan" id="myform-${formCount}">
                <label for="Tittle-${formCount}">Tittle</label>
                <input type="text" class="form-control" id="Tittle-${formCount}" name="tittle[]" required>
                <label for="Nama-${formCount}">Nama</label>
                <input type="text" class="form-control" id="Nama-${formCount}" name="nama[]" required>
                <label for="Nik-${formCount}">Nik</label>
                <input type="text" class="form-control" id="Nik-${formCount}" name="nik[]" required>
                <button type="button" class="btn btn-danger btn-remove" data-remove="${formCount}">Remove</button>
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
