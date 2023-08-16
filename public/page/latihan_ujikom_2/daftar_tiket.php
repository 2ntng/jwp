<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>

<?php
$tiket = getAllDataTiket();
?>
<br><br>
<div class="container custom-container shadow p-3 mb-5 rounded">
  <div class="row mb-3">
    <h2 class="text-center">Daftar Tiket</h2>
  </div>
  <table class="table align-middle">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nama Pemesan</th>
        <th scope="col">Tempat Wisata</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tiket as $iter) : ?>
        <tr>
          <th scope="row"><?= $iter['id_tiket'] ?></th>
          <td><?= $iter['nama'] ?></td>
          <td><?= $iter['nama_tempat'] ?></td>
          <td><a href="tiket.php?id=<?= $iter['id_tiket'] ?>" class="btn btn-primary btn-sm" style="width:100%">Lihat</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require 'layout/footer.php'; ?>