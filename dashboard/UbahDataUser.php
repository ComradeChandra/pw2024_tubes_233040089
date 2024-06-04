<?php
require '../functions.php';

$id = $_GET['id'];

$user = query("SELECT * FROM users WHERE id = $id")[0];


if (isset($_POST['ubah'])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        
                    alert('data berhasil diubah!');
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
    <title> Ubah Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

    <div div class="container col-8">

        <h1>Ubah Pengguna</h1>
        <form action=" " method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $user['id'] ?> ">
            <div class="mb-3">
                <label for="username" class="form-label">USERNAME</label>
                <input type="text" class="form-control" id="user" name="username" value="<?= $user['username'] ?>"
                    required>

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">PASSWORD</label>
                <input type="text" class="form-control" id="password" name="password" value="<?= $user['password'] ?> "
                    required>

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">EMAIL</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?> " required>

            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">GAMBAR PROFILE</label>
                <input type="file" class="form-control " id="gambar" name="gambar" required>
                <input type="hidden" value="<?= $user['gambar'] ?>" name="gambarLama">
            </div>
            <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
        </form>
    </div>
</body>

</html>