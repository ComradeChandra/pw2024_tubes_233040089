<?php
require '../../functions/functions.php';

$users = query("SELECT * FROM games");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="tambahgame.php"><button class="btn btn-primary mt-5 ms-5 mb-5 me-5">TAMBAH GAME</button></a>
        <table border="1" cellpadding="14" cellspacing="0" class="table">
            <tr>
                <th>ID</th>
                <th>NAMA GAME</th>
                <th>KATEGORI</th>
                <th>HARGA</th>
                <th>DATE</th>
                <th>GAMBAR</th>
                <th>ALTER DATA</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($users as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($i) ?></td>
                    <td><?= htmlspecialchars($row["namagame"]); ?></td>
                    <td><?= htmlspecialchars($row["kategori_id"]); ?></td>
                    <td><?= htmlspecialchars($row["harga"]); ?></td>
                    <td><?= htmlspecialchars($row["date"]); ?></td>
                    <td><img src="../../img/gambargame/<?= $row["gambar_game"] ?>" alt="" width="100"></td>
                    <td>
                        <a href="updategame.php?id=<?= $row['id'] ?>"><button class="btn btn-warning">UBAH GAME</button></a>
                        <a href="hapusgame.php?id=<?= $row["id"] ?>"
                            onclick="return confirm('Kamu Yakin min mau hapus game ini?');"><button
                                class="btn btn-danger">HAPUS
                                GAME</button></a>
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