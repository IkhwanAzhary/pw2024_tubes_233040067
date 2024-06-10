<?php

require 'functions.php';
$sport = query('SELECT * FROM sport');

if( isset($_POST["cari"])) {
  $sport = cari($_POST["keyword"]);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemograman Web | Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

        <h1 class="d-flex justify-content-center">Daftar Koleksi Sepeda</h1>
        <a href="tambah.php" class="btn btn-primary">Tambah Data Sepeda</a>
        <a href="logout.php" class="btn btn-danger d-flex float-end">logout</a>
        <br><br>
        
        <form action="" method="post">
          <input type="text" name="keyword" size="40" autofocus placeholder="Masukan Pencarian Sepeda" autocomplete="off" id="keyword">
          <button type="submit" name="cari" id="tombol-cari">Cari!</button>
        </form>

        <br>

        <div id="container2">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Gambar</th>
                <th scope="col">Jenis</th>
                <th scope="col">Harga</th>
                <th scope="col">Detail</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>

              <?php $i = 1; ?>
              <?php foreach ($sport as $spt) : ?>

                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><img src="../img/<?php echo $spt["gambar"]; ?>" width="150"></td>
                  <td><?= $spt["jenis"]; ?></td>
                  <td><?= $spt["harga"]; ?></td>
                  <td>
                    <a href="detail.php?id=<?php echo $spt["id"]; ?>" <span class="badge text-bg-secondary text-decoration-none">Detail</span></a>
                  </td>
                  <td>
                  <a href="edit.php?id=<?php echo $spt["id"]; ?>" <span class="badge text-bg-warning text-decoration-none">Edit</span></a> 
                  <a href="hapus.php?id=<?php echo $spt["id"]; ?>" onclick="return confirm('yakin?');" <span class="badge text-bg-danger text-decoration-none">Hapus</span></a>
                  </td>
                </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
        
          </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>

  </body>
</html>