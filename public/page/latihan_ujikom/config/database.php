<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "kampuskuaja";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    // header("Location: error.html");
    die("Connection failed: " . mysqli_connect_error());
  }
  // echo "Connected successfully";
?>