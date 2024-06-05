<?php
require '../../functions/functions.php';
$kategori = query("SELECT * FROM kategori");
// jika tombol tambah ditekan

if (isset($_POST['tambahgame'])) {
    //jika data berhasil ditambahkan
    if (tambahgame($_POST) > 0) {
        echo "<script>
        
                    alert('data berhasil ditambah');
                    document.location.href = 'adminaturgame.php';

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
    <title> Tambah Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <div div class="container col-8">

        <h1>Tambah Game</h1>
        <form action=" " method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="namagame" class="form-label">Nama Game</label>
                <input type="text" class="form-control" id="namagame" name="namagame" required>

            </div>
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori Game</label>
                <select class="custom-select my-1 mr-sm-2" name="kategori_id" id="kategori_id">
                    <option value="">Choose a Category</option>

                    <?php if (isset($kategori) && is_array($kategori)): ?>
                        <?php foreach ($kategori as $ktg): ?>
                            <option value="<?= $ktg['id']; ?>"> <?= $ktg['nama_kategori']; ?> </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option disabled>No categories available</option> <?php endif; ?>
                </select>

            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" required>

            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar" required>

                <button type="submit" name="tambahgame" class="btn btn-primary">Tambah Data</button>
        </form>

    </div>
</body>

</html>