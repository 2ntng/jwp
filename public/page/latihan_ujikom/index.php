<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>
<?php require 'config/database.php'; ?>
<?php require 'function/database.php'; ?>

<?php
$beasiswas = GetDataBeasiswa($conn);
?>

<div class="my-1"><br></div>
<div class="container-md my-5">
  <div class="row justify-content-center">
    <div class="col-md-8 text-center">
      <h2>DAFTAR BEASISWA</h2>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Pilihan Beasiswa
        </div>
        <div class="card-body">
          <div class="container-block text-center">
            <div class="container align-items-center">
              <div class="row justify-content-center">
                <?php foreach ($beasiswas as $beasiswa) : ?>
                  <div class="col-md-6 mb-3">
                    <div class="card text-center shadow-sm h-100">
                      <div class="card-body">
                        <h5 class="card-title"><?= $beasiswa['nama'] ?></h5>
                        <p class="card-text"><?= $beasiswa['deskripsi'] ?></p>
                        <a href="./daftar.php" class="btn btn-primary">Read more</a>
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
  </div>
</div>
<div class="my-1"><br></div>


<?php require 'layout/footer.php'; ?>