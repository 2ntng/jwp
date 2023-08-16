<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>
<?php
$tempat = getAllDataTempat();
?>

<br><br>
<div class="container custom-container shadow p-3 mb-5 rounded">
  <div class="row mb-3">
    <h2 class="text-center">Daftar Wisata</h2>
  </div>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($tempat as $tmp) : ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?= $tmp['foto'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $tmp['nama_tempat'] ?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Rp. <?= number_format($tmp['harga']) ?></li>
          </ul>
          <div class="card-body text-center">
            <a href="pesan_tiket.php?id_tempat=<?= $tmp['id_tempat'] ?>" class="btn btn-primary">Pesan tiket</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


<?php require 'layout/footer.php'; ?>