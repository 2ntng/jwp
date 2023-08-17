<?php
// Get URI
$page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary bg-gradient">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="https://www.indotechpren.org/assets/img/unila.png" height="30" class="d-inline-block align-text-bottom">

      <b>Unila AKAP</b>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse me-auto" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $page == 'index.php' ? 'active' : ''; ?>" aria-current="page" href="index.php">Daftar Wisata</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'pesan_tiket.php' ? 'active' : ''; ?>" href="pesan_tiket.php">Pesan Tiket</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'daftar_tiket.php' ? 'active' : ''; ?>" href="daftar_tiket.php">Daftar Tiket</a>
        </li>
      </ul>
    </div>
  </div>
</nav>