<?php
require 'functions.php';

$users = query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>

<body>
    <a href="input.php">TAMBAHKAN USER</a>
    <table border="1" cellpadding="14" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>IMAGES</th>
            <th>ALTER DATA</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($users as $row): ?>
            <tr>
                <td><?= htmlspecialchars($i) ?></td>
                <td><?= htmlspecialchars($row["username"]); ?></td>
                <td><?= htmlspecialchars($row["email"]); ?></td>
                <td><?= htmlspecialchars($row["password"]); ?></td>
                <td><?= htmlspecialchars($row["gambar"]); ?></td>
                <td>
                    <a href="#">UBAH</a>
                    <a href="#">HAPUS</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>