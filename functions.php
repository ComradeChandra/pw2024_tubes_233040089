<?php

// Variable Connect digunakan untuk menghubungkan bagian back-end dengan Database
$connect = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040089');

// Jika Website gagal menghubungkan dengan database, maka akan menjalankan program ini
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
function query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($connect));
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function input($input)
{
    global $connect;

    $username = $input["username"];
    $password = $input["password"];
    $email = $input["email"];
    $gambar = $input["gambar"];

    $query = query("
                                INSERT INTO users (username, password, email, gambar)
                                VALUES ('$username', '$password', '$email', '$gambar');
                            ");

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

