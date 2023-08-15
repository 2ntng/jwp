<?php 
require '../config/database.php';
require '../function/database.php';

echo GetNpm($conn, $_GET['email']);