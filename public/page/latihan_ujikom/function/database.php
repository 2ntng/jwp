<?php
// require $conn as database connection


function GetDataBeasiswa($conn)
{
  $sql = "SELECT id_beasiswa, nama, deskripsi, logo FROM tb_beasiswa";
  return mysqli_fetch_all($conn->query($sql), MYSQLI_ASSOC);
}

function GetDataRegistrasi($conn)
{
  $sql = "SELECT R.nama_lengkap , email, no_hp, semester, ipk, 
                 B.nama AS beasiswa, status_ajuan
          FROM tb_registrasi R
          LEFT JOIN tb_mahasiswa M ON R.npm = M.npm
          LEFT JOIN tb_beasiswa B ON B.id_beasiswa = R.id_beasiswa";
  return mysqli_fetch_all($conn->query($sql), MYSQLI_ASSOC);
}

function GetNpm($conn, $email)
{
  $sql = "SELECT npm FROM tb_mahasiswa
          WHERE email = '" . $email . "'";
  if (mysqli_fetch_assoc($conn->query($sql))) {
    return mysqli_fetch_assoc($conn->query($sql))['npm'];
  }
}

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


function InsertDataRegistrasi($conn, $npm, $id_beasiswa, $nama_lengkap, $no_hp, $semester, $ipk)
{
  $sql = "INSERT INTO tb_registrasi (npm, id_beasiswa, nama_lengkap, no_hp, semester, ipk, status_ajuan) 
      VALUES ('{$npm}', $id_beasiswa, '{$nama_lengkap}', '{$no_hp}', {$semester}, {$ipk}, 'Belum diverifikasi')";
  $conn->query($sql);
}
