<?php

if (isset($_SESSION["login"])) {
    $role = $_SESSION["role"];
}

?>

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="../halaman/index.php">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../halaman/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        if (isset($_SESSION["login"])):

                            ?>
                            <li><a class="dropdown-item" href="../halaman/logout.php">Logout</a></li>
                            <?php
                        else:
                            ?>
                            <li><a class="dropdown-item" href="../halaman/login.php">Login</a></li>
                            <?php
                        endif;
                        ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php
                        if (isset($_SESSION["login"])):

                            ?>
                            <li><a class="dropdown-item" href="#"><?= $role; ?></a></li>
                            <?php
                        endif;
                        ?>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="keyword">
                <button class="btn btn-outline-dark" type="submit">Cari Game...</button>
            </form>
        </div>
    </div>
</nav>