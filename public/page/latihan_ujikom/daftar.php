<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>
<?php require 'config/database.php'; ?>
<?php require 'function/database.php'; ?>

<?php
$beasiswas = GetDataBeasiswa($conn);
$semesters = [1, 2, 3, 4, 5, 6, 7, 8];
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
          Registrasi Beasiswa
        </div>
        <div class="card-body">
          <form method="POST" action="./hasil.php">

            <input type="text" id="npm" name="npm" hidden>

            <div class="row mb-3">
              <label for="nama" class="col-sm-4 col-form-label">Masukkan Nama</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
            </div>

            <div class="row mb-3">
              <label for="email" class="col-sm-4 col-form-label">Masukkan E-mail</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email" onchange="UpdateNpm()">
              </div>
            </div>

            <div class="row mb-3">
              <label for="no_hp" class="col-sm-4 col-form-label">Nomor HP</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="no_hp" name="no_hp">
              </div>
            </div>

            <div class="row mb-3">
              <label for="semester" class="col-sm-4 col-form-label">Semester saat ini</label>
              <div class="col-sm-8">
                <select class="form-select form-select" id="semester" name="semester" onchange="UpdateIpk()">
                  <option value="0" selected>Pilih</option>
                  <?php foreach ($semesters as $semester) : ?>
                    <option value="<?= $semester ?>"><?= $semester ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="ipk_terakhir" class="col-sm-4 col-form-label">IPK terakhir</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="ipk_terakhir" name="ipk_terakhir" readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label for="beasiswa" class="col-sm-4 col-form-label">Pilihan Beasiswa</label>
              <div class="col-sm-8">
                <select class="form-select form-select" id="beasiswa" name="beasiswa" disabled>
                  <option selected>Pilih</option>
                  <?php foreach ($beasiswas as $beasiswa) : ?>
                    <option value="<?= $beasiswa['id_beasiswa'] ?>"><?= $beasiswa['nama'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="berkas" class="col-sm-4 col-form-label">Upload Berkas Syarat</label>
              <div class="col-sm-8">
                <input class="form-control" type="file" id="berkas" disabled>
              </div>
            </div>

            <div class="row justify-content-evenly">
              <div class="col-4 d-grid">
                <button type="submit" id="btnSubmit" class="btn btn-block btn-primary align-self-center" disabled>Submit</button>
              </div>
              <div class="col-4 d-grid">
                <button type="button" class="btn btn-block btn-danger align-self-center">Batal</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="my-1"><br></div>

<script src=".\function\daftar.js"></script>

<?php require 'layout/footer.php'; ?>