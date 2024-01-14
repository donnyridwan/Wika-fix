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
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Landing Page</h1>

        <form action="{{ route('landing.scrape') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="depature">depature:</label>
                <input type="text" class="form-control" id="depature" name="depature" required>
            </div>

            <div class="form-group">
                <label for="destination">Tujuan:</label>
                <input type="text" class="form-control" id="destination" name="destination" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="text" class="form-control" id="datepicker" name="tanggal" required>
            </div>
            <label for="airline" class="form-label">Maskapai</label>
            <select class="form-select" aria-label="Default select example" id="airline" name="airline">
                <option selected>Semua</option>
                <option value="&airlines=GA">Garuda</option>
                <option value="user">user</option>
            </select>

            <!-- Tambahkan input atau elemen form lainnya sesuai kebutuhan -->

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
