<?php require 'database/db_function.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>

<?php
if (isset($_POST['submit'])) {
  insertDataTiket($_POST);
}
if (isset($_GET['id_tempat'])) {
  $id_tempat = $_GET['id_tempat'];
} else {
  $id_tempat = 0;
}
$tempat = getAllDataTempat();
?>

<br><br>
<div class="container custom-container shadow p-3 mb-5 rounded">
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
        <input type="text" class="form-control" id="no_identitas" name="no_identitas" minlength="16" maxlength="16" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
      </div>
    </div>
    <div class="row mb-3">
      <label for="no_hp" class="col-sm-3 col-form-label">No. HP</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="no_hp" name="no_hp" maxlength="16" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
      </div>
    </div>
    <div class="row mb-3">
      <label for="tempat_wisata" class="col-sm-3 col-form-label">Tempat Wisata</label>
      <div class="col-sm-9">
        <select class="form-select" id="tempat_wisata" name="tempat_wisata" onchange="updateHarga()" required>
          <option value="0" disabled="disabled" selected>Pilih tempat wisata</option>
          <?php
          foreach ($tempat as $tmp) {
            echo "<option value='$tmp[id_tempat]'";
            if ($tmp['id_tempat'] == $id_tempat) {
              echo "selected";
            }
            echo ">$tmp[nama_tempat]</option>";
          }
          ?>
        </select>
      </div>
    </div>
    <div class="row mb-3">
      <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
      <div class="col-sm-9">
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="pj_dewasa" class="col-sm-3 col-form-label">Pengunjung Dewasa</label>
      <div class="col-sm-9">
        <input type="number" min="0" class="form-control" id="pj_dewasa" name="pj_dewasa">
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-sm-3 col-form-label">
        <label for="pj_anak" aria-describedby="anakHelper">Pengunjung Anak-anak</label>
        <div id="anakHelper" class="form-text">Usia di bawah 12 tahun</div>
      </div>
      <div class="col-sm-9">
        <input type="number" min="0" class="form-control" id="pj_anak" name="pj_anak">
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
    <div class="row m-1 align-items-center">
      <div class="col-4">
        <button type="button" class="btn btn-primary btn-block" style="width:100%" onclick="totalHarga()">Hitung Total Bayar</button>
      </div>
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block" style="width:100%" name="submit">Pesan Tiket</button>
      </div>
      <div class="col-4">
        <button type="button" class="btn btn-primary btn-block" style="width:100%">Cancel</button>
      </div>
    </div>
  </form>
</div>

<script>
  document.getElementById('tempat_wisata').setAttribute('selected', 'selected');
  var harga = <?php
              $harga = array(0);
              foreach ($tempat as $tmp) {
                $harga += ["$tmp[id_tempat]" => intval($tmp['harga'])];
              }
              echo json_encode($harga); ?>;

  function updateHarga() {
    let tempat = document.getElementById('tempat_wisata').value;
    if (tempat != 0) {
      document.getElementById('block_harga_tiket').textContent = "Rp. " + numberFormat(harga[tempat]);
    }
  }

  function totalHarga() {
    let tempat = document.getElementById('tempat_wisata').value;
    let jml_dewasa = document.getElementById('pj_dewasa').value;
    let jml_anak = document.getElementById('pj_anak').value;
    let harga_dewasa = harga[tempat] * jml_dewasa;
    let harga_anak = harga[tempat] * jml_anak * 0.5;
    document.getElementById('block_total_tiket').textContent = "Rp. " + numberFormat(harga_dewasa + harga_anak);
  }

  function numberFormat(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  updateHarga();
</script>

<?php require 'layout/footer.php'; ?>