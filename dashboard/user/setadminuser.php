<?php
require '../../functions/functions.php';


$id = $_GET['id'];

//jika data berhasil ditambahkan
if (setadmin($id) > 0) {
    echo "<script>
        
                    alert('oke ini user udah jadi admin');
                    document.location.href = 'admin.php';

                </script>";
}