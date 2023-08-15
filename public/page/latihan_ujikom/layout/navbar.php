<?php 
// Get URI
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
?>
<!-- navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'index.php' ? 'active' : '' ; ?>" href="./">Pilihan Beasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'daftar.php' ? 'active' : '' ; ?>" href="./daftar.php">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'hasil.php' ? 'active' : '' ; ?>" href="./hasil.php">Hasil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
