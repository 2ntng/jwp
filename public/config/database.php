<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "juniorprogrammer";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // return $conn;
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // echo "Connected successfully";
?>