<?php
require 'functions.php';
$mahasiswa = query('SELECT * FROM sport');

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sporty Boss</title>
    <link rel="stylesheet" href="style.css">

    <!-- box icons link -->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sporty<strong>Boss</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link active" aria-current="page" href="#">Bikes</a>
        <a class="nav-link" href="#">Register</a>
        <a class="nav-link" href="#">Login</a>
      </div>
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/img1.jpeg" class="d-block ms-auto" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/img2.jpeg" class="d-block ms-auto" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/img3.jpeg" class="d-block ms-auto" alt="...">
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

<div class="container ">
  <div class="row">
    <div class="col-4">
      <div class="card">
        <img src="../img/merk1.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Polygon</h5>
          <p class="card-text">Polygon Bikes merupakan salah satu merek lokal ternama yang berdiri sejak 1989. Sepeda merek Polygon bukan hanya dijual di Indonesia saja, melainkan juga terdistribusi hingga 32 negara. Ada banyak jenis sepeda Polygon yang sudah diproduksi dan laku keras di pasaran. Beberapa di antaranya adalah tipe MTB, Road, City Bike, BMX, Dirt Jump, dan Youth.</p>
          <a href="dtpolygon.php" class="btn btn-primary">Lihat Koleksi</a>
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="card">
        <img src="../img/merk2.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">United</h5>
          <p class="card-text">Banyaknya varian dan jenis produk yang dihasilkan, menjadikan United Bike sebagai brand sepeda yang memiliki pasar yang luas dan tidak terbatas hanya pada satu kalangan saja. Tidak hanya lewat inovasi dan penerapan teknologi yang up-to-date pada setiap produk yang diciptakan, United Bike turut mendukung berbagai kegiatan sepeda, mulai dari event masal hingga kejuaraan bertaraf nasional dan internasional.</p>
          <a href="login.php" class="btn btn-primary">Lihat Koleksi</a>
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="card">
        <img src="../img/merk3.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Polygon</h5>
          <p class="card-text">Polygon Bikes merupakan salah satu merek lokal ternama yang berdiri sejak 1989. Sepeda merek Polygon bukan hanya dijual di Indonesia saja, melainkan juga terdistribusi hingga 32 negara. Ada banyak jenis sepeda Polygon yang sudah diproduksi dan laku keras di pasaran. Beberapa di antaranya adalah tipe MTB, Road, City Bike, BMX, Dirt Jump, dan Youth.</p>
          <a href="login.php" class="btn btn-primary">Lihat Koleksi</a>
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="card">
        <img src="../img/merk4.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Polygon</h5>
          <p class="card-text">Polygon Bikes merupakan salah satu merek lokal ternama yang berdiri sejak 1989. Sepeda merek Polygon bukan hanya dijual di Indonesia saja, melainkan juga terdistribusi hingga 32 negara. Ada banyak jenis sepeda Polygon yang sudah diproduksi dan laku keras di pasaran. Beberapa di antaranya adalah tipe MTB, Road, City Bike, BMX, Dirt Jump, dan Youth.</p>
          <a href="login.php" class="btn btn-primary">Lihat Koleksi</a>
        </div>
      </div>
    </div>

    <a href=""><img src="../img/merk1.png" class="rounded float-start" alt="..."></a>
    <a href=""><img src="../img/merk2.png" class="rounded mx-auto d-block" alt="..."></a>
    <a href=""><img src="../img/merk3.png" class="rounded float-end" alt="..."></a>
      
      
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>