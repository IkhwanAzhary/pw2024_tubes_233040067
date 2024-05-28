<?php
require 'functions.php';

if( isset($_POST["submit"])) {
    if(tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'dtpolygon.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'dtpolygon.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Sepeda</title>
</head>
<body>
    
    <h1>Tambah Data Sepeda</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="Gambar">Gambar :</label>
                <input type="file" name="Gambar" id="Gambar" required>
            </li>
            <li>
                <label for="Jenis">Jenis :</label>
                <input type="text" name="Jenis" id="Jenis" required>
            </li>
            <li>
                <label for="Harga">Harga :</label>
                <input type="text" name="Harga" id="Harga" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>

</body>
</html>