<?php
require '../../functions/functions.php';

$id = $_GET['id'];
$game = query("SELECT * FROM games WHERE id =$id")[0];
$kategori_id = $game["kategori_id"];
$kategori = query("SELECT * FROM kategori WHERE id!=$kategori_id");
$kategori_lama = query("SELECT nama_kategori FROM kategori WHERE id=$kategori_id")[0]["nama_kategori"];
if (isset($_POST['ubahgame'])) {

    if (ubahgame($_POST) > 0) {
        echo "<script>
        
                    alert('data game berhasil diubah!');
                    document.location.href = 'adminaturgame.php';

                </script>";
    }



}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Ubah Data Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../CSS/main.css">
    <style>
        .container {
            background-color: #000000ab;
            padding: 10px;
            border-radius: 20px;
        }

        body {
            color: white;
        }

        table th,
        table td {
            background-color: #ffffffe2 !important;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

    <div div class="container col-8 mt-5">

        <h1>Ubah Data Game</h1>
        <form action=" " method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $game['id'] ?> ">
            <div class="mb-3">
                <label for="namagame" class="form-label">Nama Game</label>
                <input type="text" class="form-control" id="namagame" name="namagame" value="<?= $game['namagame'] ?>"
                    required>

            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Game</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"
                    required><?= $game['deskripsi'] ?></textarea>
            </div>
            <div class="mb-3">
                <select name="kategori_id" id="kategori">
                    <option value="<?= $kategori_id ?>" selected><?= $kategori_lama ?></option>
                    <?php
                    foreach ($kategori as $ktg):
                        ?>
                        <option value="<?= $ktg["id"] ?>"><?= $ktg["nama_kategori"] ?> </option>
                        <?php
                    endforeach
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Game</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?= $game["harga"] ?>"
                    required>

            </div>
            <div class="mb-3">
                <input type="hidden" name="gambar_lama" value="<?= $game["gambar_game"] ?>">
                <label for="gambar" class="form-label">Gambar Game</label>
                <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $game['gambar_game'] ?> ">

            </div>
            <div class="mb-3">
                <label for="video_game" class="form-label">Link Video/Trailer</label>
                <input type="text" class="form-control" id="video_game" name="video_game"
                    value="<?= $game['video_game'] ?> " required>
            </div>

            <button type="submit" name="ubahgame" class="btn btn-primary">Ubah Data</button>
        </form>
    </div>
</body>

</html>