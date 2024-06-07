<?php

require "../functions/functions.php";
$keyword = $_GET["keyword"];

$query = "SELECT * FROM games WHERE namagame LIKE '%$keyword%' 
";
$games = query($query);


?>

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