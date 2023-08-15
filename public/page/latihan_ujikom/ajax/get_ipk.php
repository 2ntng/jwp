<?php 
require '../config/database.php';
require '../function/database.php';

echo GetIpk($conn, $_GET['email'], $_GET['semester']);