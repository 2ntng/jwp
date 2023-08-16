<?php
// require $conn as database connection

/**
 * Ambil data beasiswa dari database.
 *
 * @param mysqli $conn koneksi database.
 * @return array Array data beasiswa.
 */
function GetDataBeasiswa($conn)
{
  $sql = "SELECT id_beasiswa, nama, deskripsi, logo FROM tb_beasiswa";
  return mysqli_fetch_all($conn->query($sql), MYSQLI_ASSOC);
}

/**
 * Ambil data registrasi dari database.
 *
 * @param mysqli $conn koneksi database.
 * @return array Array data registrasi.
 */
function GetDataRegistrasi($conn)
{
  $sql = "SELECT R.nama_lengkap , email, no_hp, semester, ipk, 
                 B.nama AS beasiswa, status_ajuan
          FROM tb_registrasi R
          LEFT JOIN tb_mahasiswa M ON R.npm = M.npm
          LEFT JOIN tb_beasiswa B ON B.id_beasiswa = R.id_beasiswa";
  return mysqli_fetch_all($conn->query($sql), MYSQLI_ASSOC);
}

/**
 * Ambil npm dari database berdasarkan email.
 *
 * @param mysqli $conn koneksi database.
 * @param string $email string e-mail.
 * @return string String NPM.
 */
function GetNpm($conn, $email)
{
  $sql = "SELECT npm FROM tb_mahasiswa
          WHERE email = '" . $email . "'";
  if (mysqli_fetch_assoc($conn->query($sql))) {
    return mysqli_fetch_assoc($conn->query($sql))['npm'];
  }
}


/**
 * Ambil ipk dari database berdasarkan email dan semester.
 *
 * @param mysqli $conn koneksi database.
 * @param string $email string e-mail.
 * @param int $email integer semester.
 * @return float IPK.
 */
function GetIpk($conn, $email, $semester)
{
  $sql = "SELECT ipk FROM tb_ipk I 
          LEFT JOIN tb_mahasiswa M ON I.npm = M.npm 
          WHERE M.email = '" . $email . "' AND I.semester = " . $semester;
  if (mysqli_fetch_assoc($conn->query($sql))) {
    return mysqli_fetch_assoc($conn->query($sql))['ipk'];
  } else {
    return "IPK tidak ditemukan";
  }
}

/**
 * Masukkan data registrasi ke database.
 *
 * @param mysqli $conn koneksi database.
 * @param string $npm string npm.
 * @param int $id_beasiswa integer id_beasiswa.
 * @param string $nama_lengkap string nama_lengkap.
 * @param string $no_hp string no_hp.
 * @param int $semester integer semester.
 * @param float $ipk float IPK.
 */
function InsertDataRegistrasi($conn, $npm, $id_beasiswa, $nama_lengkap, $no_hp, $semester, $ipk)
{
  $sql = "INSERT INTO tb_registrasi (npm, id_beasiswa, nama_lengkap, no_hp, semester, ipk, status_ajuan) 
      VALUES ('{$npm}', $id_beasiswa, '{$nama_lengkap}', '{$no_hp}', {$semester}, {$ipk}, 'Belum diverifikasi')";
  $conn->query($sql);
}
