<?php
require '../functions/functions.php';

if (isset($_POST['submit'])) {

    if (input($_POST) > 0) {
        echo "<script>
                    alert('Data anda berhasil di INPUT');
                    document.href.location = 'admin.php';
                  </script>";
    } else {
        echo "<script>
                    alert('Data anda gagal di INPUT');
                    document.href.location = 'admin.php';
                  </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function CRUD</title>
</head>

<body>
    <form action="" method="post">
        <label for="username">username: </label>
        <input type="text" name="username">

        <label for="password">password: </label>
        <input type="text" name="password">

        <label for="email">email: </label>
        <input type="text" name="email">

        <label for="gambar">gambar: </label>
        <input type="text" name="gambar">


        <input type="submit" name="submit">
    </form>
</body>

</html>