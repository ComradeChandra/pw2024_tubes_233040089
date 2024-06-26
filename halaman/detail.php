<?php
require "../functions/functions.php";
$id = $_GET["id"];
$game = query("SELECT * FROM games WHERE id = $id")[0];

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
    <link rel="stylesheet" href="../CSS/detail.css">
</head>
<?php require "../layouts/navbar.php" ?>

<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="container text-center">
                <div class="col-12 mt-4 m-auto">
                    <iframe width="400" height="220" src="<?= $game["video_game"]; ?>" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <h1><?= $game["namagame"]; ?></h1>
                <a href="" class="btn">Beli</a>
            </div>
        </div>
        <div class="col-7">
            <div class="container">
                <div class="row p-3">
                    <p><?= $game["deskripsi"]; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<body>