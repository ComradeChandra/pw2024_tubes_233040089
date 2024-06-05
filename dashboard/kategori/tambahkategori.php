<?php
require '../../functions/functions.php';
$kategori = query("SELECT * FROM kategori");
// jika tombol tambah ditekan

if (isset($_POST['tambahkategori'])) {
    //jika data berhasil ditambahkan
    if (tambahkategori($_POST) > 0) {
        echo "<script>
        
                    alert('data berhasil ditambah');
                    document.location.href = 'adminkategori.php';

                </script>";
    } else {
        echo "<script>
        
                    alert('data gagal ditambah');

                </script>";
    }



}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Tambah Kategori Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <div div class="container col-8">

        <h1>Tambah Kategori Game</h1>
        <form action=" " method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="namakategori" class="form-label">Nama Kategori game</label>
                <input type="text" class="form-control" id="namakategori" name="nama_kategori" required>

            </div>
            <button type="submit" name="tambahkategori" class="btn btn-primary">Tambah Data</button>
        </form>

    </div>
</body>

</html>