<?php
session_start();
require "../functions/functions.php";
//funngsi untuk login
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST['password'];

    $result = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' ");

    //ngecek username
    if (mysqli_num_rows($result) === 1) {
        //ngecek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;

            $_SESSION["role"] = query("SELECT role FROM users WHERE username='$username' ")[0]["role"];
            $role = $_SESSION["role"];

            if ($role === "admin" || $role === "superadmin") {
                header("location: ../dashboard/dashboard.php");
                exit;
            } else {
                header("Location: index.php");
                exit;
            }

        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/login.css">
</head>

<body>
    <div class="container">
        <h1>LOGIN USER</h1>
        <?php if (isset($error)): ?>
            <p>username/password salah, coba cek lagi</p>
        <?php endif; ?>
        <form action=" " method="post">
            <div class="mb-3">
                <div class="container text-center text-box1">
                    <label for="username" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" id="username" aria-describedby="username">
                    <div id="email" class="form-text">USERNAME DAN PASSWORD TIDAK AKAN DIBAGIKAN KE SIAPAPUN</div>
                </div>
            </div>
            <div class="container text-center text-box1">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
            </div>
            <div class="container text-center text-box-2">
                <button type="submit" name="login" class="btn btn-warning">Login</button>
                <a href="registrasi.php"><button type="button" class="btn btn-warning">Registrasi</button></a>
            </div>
        </form>
    </div>

</body>

</html>