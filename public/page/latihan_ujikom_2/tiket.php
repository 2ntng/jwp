<?php
  include 'database/db_function.php';
  if (isset($_GET['id'])) {
    $data = getDataTiket($_GET['id']);
  } else {
    header('Location: index.php');
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiket Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\css\style.css">
  </head>
  <body>
    <br><br>
    <div class="tiket container custom-container shadow p-3 mb-5 rounded" style="background: linear-gradient(60deg, rgba(238, 238, 255, 1)40%, rgba(238, 238, 255, 0.5)), url(<?= $data["foto"]?>); background-size: contain;background-position: right !important;">
      <form method="POST" action="index.php">
        <div class="row mb-3">
         <h2>Tiket Wisata</h2>
        </div>
        <div class="row">
          <div for="nama" class="col-sm-3">Nama Lengkap</div>
          <div class="col-sm-9">
            : <?= $data["nama"]?>
          </div>
        </div>
        <div class="row">
          <div for="no_identitas" class="col-sm-3">Nomor Identitas</div>
          <div class="col-sm-9">
            : <?= $data["no_iden"]?>
          </div>
        </div>
        <div class="row">
          <div for="no_hp" class="col-sm-3">No. HP</div>
          <div class="col-sm-9">
            : <?= $data["no_hp"]?>
          </div>
        </div>
        <div class="row">
          <div for="tempat_wisata" class="col-sm-3">Tempat Wisata</div>
          <div class="col-sm-9">
            : <?= $data["nama_tempat"]?>
          </div>
        </div>
        <div class="row">
          <div for="tanggal" class="col-sm-3">Tanggal Kunjungan</div>
          <div class="col-sm-9">
            : <?= date_format(date_create($data["tanggal"]),"j F Y")?>
          </div>
        </div>
        <div class="row">
          <div for="pj_dewasa" class="col-sm-3">Pengunjung Dewasa</div>
          <div class="col-sm-9">
            : <?= $data["jml_dewasa"]?> Orang
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div for="pj_anak">Pengunjung Anak-anak</div>
          </div>
          <div class="col-sm-9">
            : <?= $data["jml_anak"]?> Orang
          </div> 
        </div>
        <div class="row">
          <div class="col-sm-3">Harga Tiket</div>
          <div class="col-sm-9">
            : Rp. <?= number_format($data["harga"])?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">Total Bayar</div>
          <div class="col-sm-9">
            : Rp. <?= number_format(($data["jml_dewasa"] * $data["harga"]) + ($data["jml_anak"] * ($data["harga"] / 2)))?>
          </div>
        </div>
      </form>
    </div>
      <div class="col-2" style="margin: auto;">
        <a href="daftar_tiket.php" class="btn btn-primary" style="width:100%">Back</a>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
