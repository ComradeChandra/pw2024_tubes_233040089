<?php
session_start();
require "../functions/functions.php";
$games = query("SELECT * FROM games");

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
    <link rel="stylesheet" href="../CSS/index.css">
</head>

<body>

    <?php require "../layouts/navbar.php" ?>

    <div class="container text-center text-box1">
        <h1>TOKO GAME NOSTALGIA</h1>
    </div>
    <div class="container">
        <div class="row">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/gambargame/urbanchaos-2.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="../img/gambargame/stray-2.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="../img/gambargame/stray-2.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="../img/gambargame/stray-2.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="../img/gambargame/stray-2.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="../img/gambargame/stray-2.jpg" class="d-block" alt="...">
                    </div>


                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="container text-center text-box2">
                <h1>LIST GAME</h1>
            </div>
            <div class="row justify-content-center mt-4 gap-2" id="container">
                <?php
                foreach ($games as $game):
                    ?>
                    <div class="card col-4" style="width: 15rem;">
                        <img src="../img/gambargame/<?= $game["gambar_game"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $game["namagame"] ?></h5>
                            <p class="card-text"><?= $game["deskripsi"] ?></p>
                        </div>
                        <a href="detail.php?id=<?= $game["id"]; ?>" class="btn btn-primary mb-2">DETAIL GAME</a>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="../JS/jquery-3.7.1.min.js"></script>
        <script src="../JS/ajax.js"></script>
</body>

</html>