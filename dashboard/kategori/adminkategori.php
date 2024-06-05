<?php
require '../../functions/functions.php';

$users = query("SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Kategori Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="tambahkategori.php"><button class="btn btn-primary mt-5 ms-5 mb-5 me-5">TAMBAH KATEGORI</button></a>
        <table border="1" cellpadding="14" cellspacing="0" class="table">
            <tr>
                <th>ID</th>
                <th>NAMA KATEGORI</th>
                <th>ALTER DATA</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($users as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($i) ?></td>
                    <td><?= htmlspecialchars($row["nama_kategori"]); ?></td>
                    <td>
                        <a href="ubahkategori.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">UBAH/EDIT
                                KATEGORI</button></a>
                        <a href="hapuskategori.php?id=<?= $row["id"] ?>"
                            onclick="return confirm('Kamu Yakin min mau hapus kategori game ini?');"><button
                                class="btn btn-danger">HAPUS
                                KATEGORI GAME</button></a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>