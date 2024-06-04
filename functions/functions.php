<?php

// Variable Connect digunakan untuk menghubungkan bagian back-end dengan Database
$connect = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040089');

// Jika Website gagal menghubungkan dengan database, maka akan menjalankan program ini
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
function query($querry)
{
    global $connect;
    $result = mysqli_query($connect, $querry);
    if (!$result) {
        die("Querry failed: " . mysqli_error($connect));
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function input($input)
// ini adalah code untuk menambahkan user ke database
{
    global $connect;

    $username = $input["username"];
    $password = $input["password"];
    $email = $input["email"];
    $gambar = $input["gambar"];

    $querry = "
                                INSERT INTO users (username, password, email, gambar)
                                VALUES ('$username', '$password', '$email', '$gambar');
                            ";

    mysqli_query($connect, $querry);

    return mysqli_affected_rows($connect);
}

//fungsi untuk menghapus data user
function hapus($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM users WHERE id = $id");
    return mysqli_affected_rows($connect);

}

//fungsi untuk merubah data user
function ubah($data)
{
    global $connect;

    $id = htmlspecialchars($data['id']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $email = htmlspecialchars($data['email']);
    $gambarLama = $data['gambarLama'];


    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadgambar();
    }

    $querry = "UPDATE users SET
                USERNAME= '$username', 
                PASSWORD=  '$password',  
                EMAIL = '$email',
                GAMBAR= '$gambar' 
WHERE  ID= $id
                            ";

    mysqli_query($connect, $querry) or die(mysqli_error($connect));
    return mysqli_affected_rows($connect);

}

//Function buat nge-upload gambar
function uploadgambar()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // buat ngecek klo nggak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // buat ngecek kalo  yg diupload  gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // Cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // Generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //kalo gambar Lolos pengecekan, gambar siap diupload
    move_uploaded_file($tmpName, "img/" . $namaFileBaru);

    return $namaFileBaru;
}
