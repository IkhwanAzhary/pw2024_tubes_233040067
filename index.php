<?php
require 'tubes/functions.php';
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
    <title>Sporty Boss</title>
    <link rel="stylesheet" href="css/style-user.css">

    <!-- box icons link -->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Sporty<strong>Boss</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <input class="form-control me-2" type="search" name="keyword" placeholder="Masukan Pencarian" aria-label="Search" id="keyword">
              <button class="btn btn-outline-light" type="submit" name="cari" id="tombol-cari">Search</button>
              <a class="nav-link active" aria-current="page" href="#bikes">Bikes</a>
              <a class="nav-link" href="tubes/login.php">Login</a>
            </div>
          </div>
        </div>
      </nav>

      <!-- Carousel -->
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/navbar1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/navbar4.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/navbar3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!-- Product -->
      <div class="row" id="bikes">
        <?php foreach ($sport as $spt) : ?>
        <div class="col-lg-4 col-md-6 my-2  d-flex justify-content-around">
          <div class="card" style="width: 18rem;">
            <img src="img/<?= $spt["gambar"]; ?>" width="150" class="card-img-top">
              <div class="card-body text-center bg-dark">
                <h5 class="card-title" style="color: white"><?= $spt["jenis"];?></h5>
                <p><?= $spt["harga"]; ?></p>
                <a href="tubes/detail-user.php?id=<?= $spt["id"]; ?>" class="badge text-bg-info text-decoration-none">Detail</a>
              </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>