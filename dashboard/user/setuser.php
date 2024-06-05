<?php
require '../../functions/functions.php';


$id = $_GET['id'];

//jika data berhasil ditambahkan
if (setuser($id) > 0) {
    echo "<script>
        
                    alert('oke ini orang udah jadi user bukan lagi admin');
                    document.location.href = 'admin.php';

                </script>";
}