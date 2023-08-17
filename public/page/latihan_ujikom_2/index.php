<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>
<?php
$kelas = getAllDataKelas();
?>

<br><br>
<div class="container-md text-center">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card custom-card shadow">
        <div class="card-body">

          <div class="row mb-3">
            <h2 class="text-center">Daftar Wisata</h2>
          </div>

          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($kelas as $tmp) : ?>
              <div class="col">
                <div class="card h-100">
                  <img src="<?= $tmp['foto'] ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?= $tmp['nama_kelas'] ?></h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Rp. <?= number_format($tmp['harga']) ?></li>
                  </ul>
                  <div class="card-body text-center">
                    <a href="pesan_tiket.php?id_kelas=<?= $tmp['id_kelas'] ?>" class="btn btn-primary">Pesan tiket</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>


<?php require 'layout/footer.php'; ?>