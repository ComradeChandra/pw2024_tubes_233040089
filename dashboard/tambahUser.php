<?php
require '../functions.php';
// jika tombol tambah ditekan

if (isset($_POST['tambah'])) {
    //jika data berhasil ditambahkan
    if (tambah($_POST) > 0) {
        echo "<script>
        
                    alert('data berhasil ditambah');
                    document.location.href = '../index.php';

                </script>";
    }



}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Tambah Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <div div class="container col-8">

        <h1>Tambah Pengguna</h1>
        <form action=" " method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="Username" required>

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="text" class="form-control" id="password" name="password" required>

            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">gambar</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar" required>

                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
        </form>

    </div>
</body>

</html>