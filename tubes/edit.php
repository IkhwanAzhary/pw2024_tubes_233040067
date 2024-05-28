<?php 

require 'functions.php';
$id = $_GET["id"];

$spt = query("SELECT * FROM sport WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if (edit($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diedit!');
            document.location.href = 'dtpolygon.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diedit!');
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
    <title>edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container col-8">
        <h1>Edit Data Sepeda</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $spt["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $spt["Gambar"]; ?>">
            <div class="mb-3">
                <label for="Gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="Gambar" name="Gambar" require value="<?= $spt["Gambar"]; ?>">
            </div>
            <div class="mb-3">
                <label for="Jenis" class="form-label">Jenis</label>
                <input type="text" class="form-control" id="Jenis" name="Jenis" require value="<?= $spt["Jenis"]; ?>">
            </div>
            <div class="mb-3">
                <label for="Harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="Harga" name="Harga" require value="<?= $spt["Harga"]; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</body>
</html>