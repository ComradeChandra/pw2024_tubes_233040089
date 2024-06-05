<?php
require '../../functions/functions.php';


$id = $_GET['id'];

//jika game berhasil dihapus
if (hapusgame($id) > 0) {
    echo "<script>
        
                    alert('game berhasil dihapus');
                    document.location.href = 'adminaturgame.php';

                </script>";
}