<?php
session_start();
require "../functions/functions.php";
$games = query("SELECT * FROM games");

if (!isset($_SESSION["login"])) {
    header("location: ../halaman/login.php");
    exit;
}

if (!isset($_SESSION["role"]) === "admin") {
    header("location: ../halaman/index.php");
    exit;
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HALAMAN UTAMA USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/main.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        .card {}

        .card i {
            font-size: 8rem;
            color: white;
        }

        a.card {
            border-radius: 20px;
            background-color: #000000d4;
            color: white;
            width: 270px;
            height: 270px;
            display: block;
            text-decoration: none !important;
        }
    </style>
</head>

<body>
    <?php require "../layouts/navbar.php" ?>

    <div class="container">
        <div class="row mt-5  justify-content-center gap-5 text-decoration-none">
            <a href="game/adminaturgame.php" class="col-4 card d-flex align-items-center justify-content-center">
                <i class="ri-gamepad-fill"></i>
                <h1>game</h1>
            </a>
            <a href="kategori/adminkategori.php" class="col-4 card d-flex align-items-center justify-content-center">
                <i class=" ri-gamepad-fill"></i>
                <h1>kategori</h1>
            </a>
            <a href="user/admin.php" class="col-4 card d-flex align-items-center justify-content-center">
                <i class=" ri-gamepad-fill"></i>
                <h1>user</h1>
            </a>
        </div>
    </div>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="../JS/jquery-3.7.1.min.js"></script>
    <script src="../JS/ajax.js"></script>
</body>

</html>