<?php
require 'db_config.php';

/**
 * Fungsi menambahkan data tiket kedalam db.
 * 
 * @param array $data data dari form pesan.
 */
function insertDataTiket($data)
{
  global $conn;
  $id = md5(time());
  $query = "INSERT INTO tb_tiket VALUES ('$id', '$data[nama]', '$data[no_identitas]', 
              '$data[no_hp]', $data[kelas], '$data[tanggal]', $data[pj_reguler], 
              $data[pj_lansia], NULL, NULL)";
  if (mysqli_query($conn, $query)) {
    header('Location: tiket.php?id=' . $id);
  } else {
    echo mysqli_error($conn);
  }
}

/**
 * Fungsi mengambil data tiket pada db dengan id.
 *
 * @param string $id id tiket berbentuk hash.
 * @return array array asosiatif berisi data tiket.
 */
function getDataTiket($id)
{
  global $conn;
  $query = "SELECT * FROM tb_tiket T
              LEFT JOIN tb_kelas K ON T.id_kelas = K.id_kelas
              WHERE T.id_tiket = '$id'";
  if (mysqli_query($conn, $query)) {
    return mysqli_fetch_assoc(mysqli_query($conn, $query));
  } else {
    echo mysqli_error($conn);
  }
}

/**
 * Fungsi mengambil seluruh data tiket yang ada pada db.
 *
 * @return array array asosiatif berisi seluruh data tiket.
 */
function getAllDataTiket()
{
  global $conn;
  $query = "SELECT * FROM tb_tiket T
              LEFT JOIN tb_kelas K ON T.id_kelas = K.id_kelas";
  if (mysqli_query($conn, $query)) {
    return mysqli_query($conn, $query);
  } else {
    echo mysqli_error($conn);
  }
}

/**
 * Fungsi mengambil seluruh data kelas yang ada pada db.
 *
 * @return array array asosiatif berisi seluruh data kelas.
 */
function getAllDataKelas()
{
  global $conn;
  $query = "SELECT * FROM tb_kelas";
  if (mysqli_query($conn, $query)) {
    return mysqli_query($conn, $query);
  } else {
    echo mysqli_error($conn);
  }
}
