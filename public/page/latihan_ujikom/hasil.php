<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>
<?php require 'config/database.php'; ?>
<?php require 'function/database.php'; ?>

<?php
if (isset($_POST['npm'])) {
  InsertDataRegistrasi($conn, $_POST['npm'], $_POST['beasiswa'],
                     $_POST['nama'], $_POST['no_hp'], $_POST['semester'], $_POST['ipk_terakhir']);
}

$data_registrasi = GetDataRegistrasi($conn);
?>

<body>
  <div class="my-1"><br></div>
  <div class="container-md my-5">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h2>DAFTAR BEASISWA</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Data Registrasi
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Semester</th>
                    <th scope="col">IPK</th>
                    <th scope="col">Beasiswa</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no_baris = 1; ?>
                  <?php foreach ($data_registrasi as $data) : ?>
                    <tr>
                      <th scope="row"><?= $no_baris++; ?></th>
                      <td><?= $data['nama_lengkap']; ?></td>
                      <td><?= $data['email']; ?></td>
                      <td><?= $data['no_hp']; ?></td>
                      <td><?= $data['semester']; ?></td>
                      <td><?= $data['ipk']; ?></td>
                      <td><?= $data['beasiswa']; ?></td>
                      <td>
                        <span class="badge text-bg-primary">
                          <?= $data['status_ajuan']; ?>
                        </span>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="my-1"><br></div>

  <?php require 'layout/footer.php'; ?>