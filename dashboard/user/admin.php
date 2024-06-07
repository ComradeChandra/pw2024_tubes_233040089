<?php
session_start();
require '../../functions/functions.php';
// $_SESSION["role"] = "admin"; <--untuk nanti kalau udh bikin laman login


$peran = "superadmin"; //<-- pake ini aja dulu

//query ini sngambil semua data di tabel user yang rolenya bukan samadengan superadmin
$users = query("SELECT * FROM users WHERE role != 'superadmin'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../CSS/main.css">
    <style>
        table th,
        table td {
            background-color: #ffffffe2 !important;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">

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

                <!-- ini tuh buat ngecek apakah si user admin bukan? -->
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
                        //ini tuh buat ngecek kalau pengguna /akun ini  apakah rolenya samadengan admin?
                        if ($role === "admin"):
                            ?>
                            <!-- jika yang menggunakan ini adalah superadmin maka munculkan kode di bawah -->
                            <?php if ($peran === 'superadmin'): ?>
                                <a href="setuser.php?id=<?= $row['id'] ?>"
                                    onclick="return confirm('Kamu Yakin min mau jadiin admin ini jadi user?'); "><button>SET
                                        USER</button></a>
                            <?php endif; ?>
                            <?php
                            //jika bukan si akun bukan seorang admin maka munculkan kode di bawah
                        else:
                            ?>
                            <?php
                            //tapi jji pengguna adalah seorang superadmin maka munculkan kode di bawah 
                            if ($peran === "superadmin"):
                                ?>
                                <a href="setadminuser.php?id=<?= $row['id'] ?>"
                                    onclick="return confirm('Kamu Yakin supermin mau jadiin user ini admin?'); "><button>SET
                                        ADMIN</button></a>
                                <?php
                            endif;
                            ?>
                            <?php
                        endif;
                        ?>
                        <!-- Cek apakah akun ini adalah user atau pengguna adalah seorang superadmin munculkan kode di bawah -->
                        <?php if ($role === 'user' or $peran === 'superadmin'): ?>
                            <a href="hapusUser.php?id=<?= $row["id"] ?>"
                                onclick="return confirm('Kamu Yakin min mau hapus user ini?'); "><button>DELETE
                                    USER</button></a>
                        <?php endif; ?>
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