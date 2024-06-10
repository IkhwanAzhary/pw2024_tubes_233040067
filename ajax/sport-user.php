<?php 
require '../tubes/functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM sport 
            WHERE
            jenis LIKE '%$keyword%' OR
            harga LIKE '%$keyword%'
            ";
$sport = query($query);

?>
<div class="row" id="bikes">
    <?php foreach ($sport as $spt) : ?>
    <div class="col-lg-4 col-md-6 my-2  d-flex justify-content-around">
        <div class="card" style="width: 18rem;">
            <img src="../img/<?= $spt["gambar"]; ?>" width="150" class="card-img-top">
              <div class="card-body text-center bg-dark">
                <h5 class="card-title" style="color: white"><?= $spt["jenis"];?></h5>
                <p><?= $spt["harga"]; ?></p>
                <a href="detail-user.php?id=<?= $spt["id"]; ?>" class="badge text-bg-info text-decoration-none">Detail</a>
              </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>