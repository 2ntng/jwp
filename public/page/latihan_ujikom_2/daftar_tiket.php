<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>

<?php
$tiket = getAllDataTiket();
?>
<br><br>
<div class="container-md text-center">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card custom-card shadow">
        <div class="card-body">
          <div class="row mb-3">
            <h2 class="text-center">Daftar Tiket</h2>
          </div>
          <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Kelas Penumpang</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php $row_no = 1; ?>
              <?php foreach ($tiket as $iter) : ?>
                <tr>
                  <th scope="row"><?= $row_no++ ?></th>
                  <td><?= $iter['nama'] ?></td>
                  <td><?= $iter['nama_kelas'] ?></td>
                  <td><a href="tiket.php?id=<?= $iter['id_tiket'] ?>" class="btn btn-primary btn-sm" style="width:100%">Lihat</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <br><br>

  <?php require 'layout/footer.php'; ?>