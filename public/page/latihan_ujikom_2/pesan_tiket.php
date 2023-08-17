<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>

<?php
if (isset($_POST['submit'])) {
  insertDataTiket($_POST);
}
if (isset($_GET['id_kelas'])) {
  $id_kelas = $_GET['id_kelas'];
} else {
  $id_kelas = 0;
}
$data_kelas = getAllDataKelas();
?>

<br><br>
<div class="container-sm">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card custom-card shadow">
        <div class="card-body">
          <form method="POST">
            <div class="row mb-3">
              <h2>Form Pemesanan</h2>
            </div>
            <div class="row mb-3">
              <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="no_identitas" class="col-sm-3 col-form-label">Nomor Identitas</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="no_identitas" name="no_identitas" pattern=".{16,16}" title="Harus 16 digit" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
              </div>
            </div>
            <div class="row mb-3">
              <label for="no_hp" class="col-sm-3 col-form-label">No. HP</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="no_hp" name="no_hp" pattern=".{8,13}" title="Harus 8-13 digit" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
              </div>
            </div>
            <div class="row mb-3">
              <label for="kelas" class="col-sm-3 col-form-label">Kelas Penumpang</label>
              <div class="col-sm-9">
                <select class="form-select" id="kelas" name="kelas" onchange="updateHarga()" required>
                  <option value="0" disabled="disabled" selected>Pilih kelas penumpang</option>
                  <?php
                  foreach ($data_kelas as $kelas) : ?>
                    <option value="<?= $kelas['id_kelas'] ?>" <?= $kelas['id_kelas'] == $id_kelas ? "selected" : "" ?>>
                      <?= $kelas['nama_kelas'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Keberangkatan</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="pj_reguler" class="col-sm-3 col-form-label">Pengunjung Reguler</label>
              <div class="col-sm-9">
                <input type="number" min="0" class="form-control" id="pj_reguler" name="pj_reguler">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3 col-form-label">
                <label for="pj_lansia" aria-describedby="lansiaHelper">Pengunjung Lanjut Usia</label>
                <div id="lansiaHelper" class="form-text">Usia 60 tahun ke atas</div>
              </div>
              <div class="col-sm-9">
                <input type="number" min="0" class="form-control" id="pj_lansia" name="pj_lansia">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3 col-form-label">Harga Tiket</div>
              <div class="col-sm-9 col-form-label" id="block_harga_tiket"></div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3 col-form-label">Total Harga</div>
              <div class="col-sm-9 col-form-label" id="block_total_tiket"></div>
            </div>
            <div class="row mb-3">
              <div class="col-sm">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="confirm" required>
                  <label class="form-check-label" for="confirm">
                    Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan
                  </label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 my-1">
                <button type="button" class="btn btn-primary btn-block" style="width:100%" onclick="totalHarga()">Hitung Total Bayar</button>
              </div>
              <div class="col-md-4 my-1">
                <button type="submit" class="btn btn-primary btn-block" style="width:100%" name="submit">Pesan Tiket</button>
              </div>
              <div class="col-md-4 my-1">
                <button type="button" class="btn btn-primary btn-block" style="width:100%">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>

<script>
  document.getElementById('kelas').setAttribute('selected', 'selected');
  var harga = <?php
              $harga = array(0);
              foreach ($data_kelas as $kelas) {
                $harga += ["$kelas[id_kelas]" => intval($kelas['harga'])];
              }
              echo json_encode($harga); ?>;

  function updateHarga() {
    let kelas = document.getElementById('kelas').value;
    if (kelas != 0) {
      document.getElementById('block_harga_tiket').textContent = "Rp. " + numberFormat(harga[kelas]);
    }
  }

  function totalHarga() {
    let kelas = document.getElementById('kelas').value;
    let jml_reguler = document.getElementById('pj_reguler').value;
    let jml_lansia = document.getElementById('pj_lansia').value;
    let harga_reguler = harga[kelas] * jml_reguler;
    let harga_lansia = harga[kelas] * jml_lansia * 0.9;
    document.getElementById('block_total_tiket').textContent = "Rp. " + numberFormat(harga_reguler + harga_lansia);
  }

  function numberFormat(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  updateHarga();
</script>

<?php require 'layout/footer.php'; ?>