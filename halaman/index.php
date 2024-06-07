<?php
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
    <style>
        .carousel-inner img {
            width: 100%;
            height: 25rem;
        }

        .card img {
            height: 250px;
        }

        .card-body {
            height: 200px;
            overflow-y: scroll;
            ;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">KERANJANG GAMING</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page">logout</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container text-center">
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
            <div class="container text-center">
                <h1>LIST GAME</h1>
            </div>
            <div class="row justify-content-center mt-4 gap-2">
                <?php
                foreach ($games as $game):
                    ?>
                    <div class="card col-4" style="width: 15rem;">
                        <img src="../img/gambargame/<?= $game["gambar_game"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $game["namagame"] ?></h5>
                            <p class="card-text"><?= $game["deskripsi"] ?></p>
                        </div>
                        <a href="detail.php?id=<?= $game["id"]; ?>" class="btn btn-primary mb-2">Go somewhere</a>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>