<?php

 $conn = mysqli_connect ('localhost', 'root', '', 'pw2024_tubes_233040067') or die('Koneksi Ke DB Gagal!');

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {    $rows[] = $row;
}

return $rows;
}

function tambah($data) {
    global $conn;

    $gambar = htmlspecialchars($data["Gambar"]);
    $jenis = htmlspecialchars($data["Jenis"]);
    $harga = htmlspecialchars($data["Harga"]);

    $query = "INSERT INTO sport
                VALUES
                (NULL, '$gambar', '$jenis', '$harga')
            ";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

function upload() {
    $namafile = $_FILES['Gambar']['name'];
    $ukuranfile = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmpName = $_FILES['Gambar']['tmp_name'];

    if( $error === 4) {
        echo "
        <script>
            alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.' , $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    if( $ukuranfile > 1000000 ) {
        echo "
        <script>
            alert('yang anda upload bukan gambar')
        </script>";
        return false;
    }

    $namafileBaru = uniqid();
    $namafileBaru .='.';
    $namafileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, "../img/" . $namafileBaru);

    return $namafile;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM sport WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;

    $id = $data["id"];
    $gambarLama = htmlspecialchars($data["Gambar"]);
    if($_FILES['Gambar']['error'] === 4) {
        $Gambar = $gambarLama;
    } else {
        $Gambar = upload();
    }
    $Jenis = htmlspecialchars($data["Jenis"]);
    $Harga = htmlspecialchars($data["Harga"]);

    $query = "UPDATE sport SET
            Gambar = '$Gambar',
            Jenis = '$Jenis',
            Harga = '$Harga'
            WHERE id = '$id'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM sport 
            WHERE
            Jenis LIKE '%$keyword%'
            ";
    return query($query);
}

?>

