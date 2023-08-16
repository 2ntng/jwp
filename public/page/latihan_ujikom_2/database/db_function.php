<?php  
  require 'db_config.php';

  //fungsi menambahkan data tiket kedalam db
  function insertDataTiket($data)
  {
    var_dump($data);
    global $conn;
    $query = "INSERT INTO tiket VALUES (NULL, '$data[nama]', '$data[no_identitas]', '$data[no_hp]', $data[tempat_wisata], '$data[tanggal]', $data[pj_dewasa], $data[pj_anak])";
    if (mysqli_query($conn, $query)) {
      $last_id = mysqli_insert_id($conn);
      header('Location: tiket.php?id='.$last_id);
    } else {
      echo mysqli_error($conn);
    }
  }

  
  //fungsi mengambil data tiket pada db dengan id
  function getDataTiket($id)
  {
    global $conn;
    $query = "SELECT * FROM tiket a, tempat b WHERE a.id_tiket = $id AND a.id_tempat = b.id_tempat";
    if (mysqli_query($conn, $query)) {
      return mysqli_fetch_assoc(mysqli_query($conn, $query));
    } else {
      echo mysqli_error($conn);
    }
  }

  //fungsi mengambil seluruh data tiket yang ada pada db
  function getAllDataTiket()
  {
    global $conn;
    $query = "SELECT * FROM tiket a, tempat b WHERE a.id_tempat = b.id_tempat";
    if (mysqli_query($conn, $query)) {
      return mysqli_query($conn, $query);
    } else {
      echo mysqli_error($conn);
    }
  }

  //fungsi mengambil seluruh data tempat yang ada pada db
  function getAllDataTempat()
  {
    global $conn;
    $query = "SELECT * FROM tempat";
    if (mysqli_query($conn, $query)) {
      return mysqli_query($conn, $query);
    } else {
      echo mysqli_error($conn);
    }
  }
?>