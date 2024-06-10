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

    $gambar = upload();
    if( !$gambar ) {
        return false;
    }
    // $gambar = htmlspecialchars($data["Gambar"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $detail = htmlspecialchars($data["detail"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "INSERT INTO sport
                VALUES
                (NULL, '$gambar', '$jenis', '$harga','$detail')
            ";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

function upload() {
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

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
            alert('ukuran gambar terlalu besar')
        </script>";
        return false;
    }

    $namafileBaru = uniqid();
    $namafileBaru .='.';
    $namafileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, "../img/" . $namafile);

    return $namafile;
}

function hapus($id) {
    global $conn;

    $spt = query("SELECT * FROM sport WHERE id = $id")[0];
    if( $spt['gambar'] != 'nophoto.jpg') {
        unlink('../img/' . $spt['gambar']);
    }

    mysqli_query($conn, "DELETE FROM sport WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;

    $id = $data["id"];
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $jenis = htmlspecialchars($data["jenis"]);
    $detail = htmlspecialchars($data["detail"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "UPDATE sport SET
            Gambar = '$gambar',
            Jenis = '$jenis',
            detail = '$detail',
            Harga = '$harga'
            WHERE id = '$id'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM sport 
            WHERE
            jenis LIKE '%$keyword%' OR
            harga LIKE '%$keyword%'
            ";
    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    
    if( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username telah terdaftar!');
              </script>";
        return false;
    }

    if( $password !== $password2 ) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;   
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);
}


?>


