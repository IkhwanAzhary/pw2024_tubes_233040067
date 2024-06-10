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
            <a href="../tubes/edit.php?id=<?php echo $spt["id"]; ?>" <span class="badge text-bg-warning text-decoration-none">Edit</span></a> 
            <a href="../tubes/hapus.php?id=<?php echo $spt["id"]; ?>" onclick="return confirm('yakin?');" <span class="badge text-bg-danger text-decoration-none">Hapus</span></a>
            </td>
          </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
   
    </table>