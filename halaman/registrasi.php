<?php
require "../functions/functions.php";
if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script> alert('USER BARU BERHASIL DITAMBAHKAN')</script>";

    } else {
        echo mysqli_error($connect);
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>REGISTRASI USER</h1>

        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="username">
                <div id="email" class="form-text">USERNAME DAN PASSWORD TIDAK AKAN DIBAGIKAN KE SIAPAPUN</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Confirm Password</label>
                <input type="confirmpassword" name="password2" class="form-control" id="confirmpassword">
            </div>


            <button type="submit" name="register" class="btn btn-warning">registrasi</button>
        </form>
    </div>

</body>

</html>