<?php
require '../../functions/functions.php';

$users = query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <table border="1" cellpadding="14" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>ROLE</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>IMAGES</th>
            <th>ALTER DATA</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($users as $row): ?>

            <!-- cek apakah si user admin bukan? -->
            <?php

            $user_id = $row["id"];
            $role = query("SELECT role FROM users WHERE id =$user_id")[0]["role"];

            ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row["role"]; ?></td>
                <td><?= $row["username"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["password"]; ?></td>
                <td><img src="../img/<?= $row['gambar'] ?>" alt="" width="75"></td>
                <td>
                    <?php
                    if ($role === "admin"):
                        ?>
                        <a href="setuser.php?id=<?= $row['id'] ?>"
                            onclick="return confirm('Kamu Yakin min mau jadiin admin ini jadi user?'); "><button>SET
                                USER</button></a>
                        <?php
                    else:
                        ?>
                        <a href="setadminuser.php?id=<?= $row['id'] ?>"
                            onclick="return confirm('Kamu Yakin min mau jadiin user ini admin?'); "><button>SET
                                ADMIN</button></a>
                        <?php
                    endif;
                    ?>

                    <a href="hapusUser.php?id=<?= $row["id"] ?>"
                        onclick="return confirm('Kamu Yakin min mau hapus user ini?'); "><button>DELETE USER</button></a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>