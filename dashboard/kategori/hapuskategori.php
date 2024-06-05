<?php
require '../../functions/functions.php';


$id = $_GET['id'];

//jika kategori berhasil dihapus
if (hapuskategori($id) > 0) {
    echo "<script>
        
                    alert('kategori untuk game berhasil dihapus');
                    document.location.href = 'adminkategori.php';

                </script>";
}