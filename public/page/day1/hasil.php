<?php require 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil</title>
</head>

<body>

  <?php if (isset($_POST['cara'])) :
    switch ($_POST['cara']) {
      case 1: ?>
        <table>
          <tr>
            <td>Angka</td>
            <td>: <?= $_POST['a1'] ?></td>
          </tr>
          <tr>
            <td>
              <hr>
            </td>
          </tr>
          <tr>
            <td>Cara 1</td>
            <td>
              <?php $starttime = microtime(true); ?>
              : <?= cara1($_POST['a1']) ?>
            </td>
          </tr>
    <?php break;
      case 2: ?>
        <table>
          <tr>
            <td>Angka</td>
            <td>: <?= $_POST['a1'] ?></td>
          </tr>
          <tr>
            <td>
              <hr>
            </td>
          </tr>
          <tr>
            <td>Cara 2</td>
            <td>
              <?php $starttime = microtime(true); ?>
              : <?= cara2($_POST['a1']) ?>
            </td>
          </tr>
    <?php break;
      case 3: ?>
        <table>
          <tr>
            <td>Angka</td>
            <td>: <?= $_POST['a1'] ?></td>
          </tr>
          <tr>
            <td>
              <hr>
            </td>
          </tr>
          <tr>
            <td>Cara 3</td>
            <td>
              <?php $starttime = microtime(true); ?>
              : <?= cara3($_POST['a1']) ?>
            </td>
          </tr>
    <?php break;
    } ?>
    <tr>
      <td>Execution time (s)</td>
      <td>: <?= number_format(microtime(true) - $starttime, 10); ?></td>
    </tr>
    </table>
  <?php endif; ?>


  <br>
  <a href="./"><button>Kembali</button></a>
</body>

</html>