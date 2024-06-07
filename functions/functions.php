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

//Fungsi untuk set user jadi admin

function setadmin($id)
{
    global $connect;
    mysqli_query($connect, "UPDATE users SET role = 'admin' WHERE id = $id");
    return mysqli_affected_rows($connect);

}

//Fungsi untuk set admin  jadi user

function setuser($id)
{
    global $connect;
    mysqli_query($connect, "UPDATE users SET role = 'user' WHERE id = $id");
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
// function ubah($data)
// {
//     global $connect;

//     $id = $data['id'];
//     $username = $data['username'];
//     $password = $data['password'];
//     $email = $data['email'];
//     $gambarLama = $data['gambarLama'];


//     if ($_FILES['gambar']['error'] === 4) {
//         $gambar = $gambarLama;
//     } else {
//         $gambar = uploadgambar("../../img/gambaruser");
//     }

//     $querry = "UPDATE users SET
//                 USERNAME= '$username',                       <-----CODE NGANGGUR
//                 PASSWORD=  '$password',  
//                 EMAIL = '$email',
//                 GAMBAR= '$gambar' 
// WHERE  ID= $id
//                             ";

//     mysqli_query($connect, $querry) or die(mysqli_error($connect));
//     return mysqli_affected_rows($connect);

// }

//Function buat nge-upload gambar
function uploadgambar($alamatfile)
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
    if ($ukuranFile > 10000000) {
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
    move_uploaded_file($tmpName, $alamatfile . $namaFileBaru);

    return $namaFileBaru;
}

//Function buat ngehapus game
function hapusgame($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM games WHERE id = $id");
    return mysqli_affected_rows($connect);

}
// ini adalah code untuk menambahkan game ke database
function tambahgame($tambahgame)
{
    global $connect;

    $namagame = $tambahgame["namagame"];
    $deskripsi = $tambahgame["deskripsi"];
    $kategori_id = $tambahgame["kategori_id"];
    $harga = $tambahgame["harga"];

    $gambar_game = uploadgambar("../../img/gambargame/");
    $video_game = $tambahgame["video_game"];

    $querry = "
                                INSERT INTO games (namagame, deskripsi, kategori_id, harga, gambar_game,video_game)
                                VALUES ('$namagame','$deskripsi', '$kategori_id' ,'$harga', '$gambar_game','$video_game');
                            ";

    mysqli_query($connect, $querry);

    return mysqli_affected_rows($connect);
}

// function buat ngubah data game
function ubahgame($data)
{
    global $connect;

    $id = $data["id"];
    $namagame = $data['namagame'];
    $deskripsi = $data['deskripsi'];
    $kategori_id = $data['kategori_id'];
    $harga = $data['harga'];
    $gambar_lama = $data["gambar_lama"];
    $video_game = $data["video_game"];


    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar_lama;
    } else {
        $gambar = uploadgambar("../../img/gambargame/");
    }

    $querry = "UPDATE games SET
                namagame= '$namagame', 
                deskripsi= '$deskripsi', 
                kategori_id=  '$kategori_id',  
                harga = '$harga',
                gambar_game= '$gambar',
                video_game= '$video_game'
WHERE  id = $id
                            ";

    mysqli_query($connect, $querry) or die(mysqli_error($connect));
    return mysqli_affected_rows($connect);

}

//Function buat ngehapus kategori game
function hapuskategori($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM kategori WHERE id = $id");
    return mysqli_affected_rows($connect);

}
// ini adalah code untuk menambahkan kategori game ke database
function tambahkategori($tambahkategori)
{
    global $connect;

    $nama_kategori = $tambahkategori["nama_kategori"];



    $querry = "
                                INSERT INTO kategori (nama_kategori)
                                VALUES ('$nama_kategori');
                            ";

    mysqli_query($connect, $querry);

    return mysqli_affected_rows($connect);
}

// function buat ngubah data game
function ubahkategori($data)
{
    global $connect;

    $id = $data["id"];
    $namakategori = $data['nama_kategori'];

    $querry = "UPDATE kategori SET
                nama_kategori = '$namakategori'  WHERE  id = $id
                            ";

    mysqli_query($connect, $querry) or die(mysqli_error($connect));
    return mysqli_affected_rows($connect);

}