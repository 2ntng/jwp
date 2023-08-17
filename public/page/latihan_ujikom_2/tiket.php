<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>

<?php
if (isset($_GET['id'])) {
  $data = getDataTiket($_GET['id']);
} else {
  header('Location: index.php');
}
?>

<br><br>
<div class="row m-0 justify-content-center">
  <div class="col-md-6">
    <div class="tiket container shadow p-3 mb-5 rounded" style="background: linear-gradient(60deg, rgba(238, 238, 255, 1)40%, rgba(238, 238, 255, 0.5)), url(<?= $data["foto"] ?>); background-size: contain;background-position: right !important;">
      <form method="POST">
        <div class="row mb-3">
          <h2>Tiket Perjalanan</h2>
        </div>
        <div class="row">
          <div for="nama" class="col-sm-4">Nama Lengkap</div>
          <div class="col-sm-8">
            : <?= $data["nama"] ?>
          </div>
        </div>
        <div class="row">
          <div for="no_identitas" class="col-sm-4">Nomor Identitas</div>
          <div class="col-sm-8">
            : <?= $data["no_iden"] ?>
          </div>
        </div>
        <div class="row">
          <div for="no_hp" class="col-sm-4">No. HP</div>
          <div class="col-sm-8">
            : <?= $data["no_hp"] ?>
          </div>
        </div>
        <div class="row">
          <div for="kelas" class="col-sm-4">Kelas Penumpang</div>
          <div class="col-sm-8">
            : <?= $data["nama_kelas"] ?>
          </div>
        </div>
        <div class="row">
          <div for="pj_reguler" class="col-sm-4">Jumlah Penumpang</div>
          <div class="col-sm-8">
            : <?= $data["jml_reguler"] ?> Orang
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div for="pj_lansia">Jumlah Penumpang Lansia</div>
          </div>
          <div class="col-sm-8">
            : <?= $data["jml_lansia"] ?> Orang
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">Harga Tiket</div>
          <div class="col-sm-8">
            : Rp. <?= number_format($data["harga"]) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">Total Bayar</div>
          <div class="col-sm-8">
            : Rp. <?= number_format(($data["jml_reguler"] * $data["harga"]) + ($data["jml_lansia"] * ($data["harga"] * 0.9))) ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="col-2" style="margin: auto;">
  <a href="daftar_tiket.php" class="btn btn-primary" style="width:100%">Back</a>
</div>

<?php require 'layout/footer.php'; ?>