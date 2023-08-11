<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil</title>
</head>
<body>
  
<?php
    $number = $_POST['a1'];

    // Operation : 1 + (1 * n) + 1 = n + 2
    // Big O : O(n)
    function cara1($n){
      $sum = 0;   //  1
      for ($i=$n; $i > 0; $i--) {  // *n
        $sum += $i;   // 1
      }
      return $sum; // 1
    }

    // Operation : 4
    // Big O : O(1)
    function cara3($n){
      return ($n + 1) * $n / 2; // 4
    }
  
  ?>
  <table>
    <tr>
      <td>Angka</td>
      <td>: <?= $_POST['a1'] ?></td>
    </tr>
    <tr>
      <td><hr></td>
    </tr>
    <tr>
      <td>Cara 1</td>
      <td>
        <?php $starttime = microtime(true); ?>
        : <?= cara1($_POST['a1']) ?>
      </td>
    </tr>
    <tr>
      <td>Operation</td>
      <td>: 1 + (1 * n) + 1 = n + 2</td>
    </tr>
    <tr>
      <td>Big O</td>
      <td>: O(n)</td>
    </tr>
    <tr>
      <td>Execution time (s)</td>
      <td>: <?= microtime(true) - $starttime; ?></td>
    </tr>
    <tr>
      <td><hr></td>
    </tr>
    <tr>
      <td>Cara 3</td>
      <td>
        <?php $starttime = microtime(true); ?>
        : <?= cara3($_POST['a1']) ?>
      </td>
    </tr>
    <tr>
      <td>Operation</td>
      <td>: 4</td>
    </tr>
    <tr>
      <td>Big O</td>
      <td>: O(1)</td>
    </tr>
    <tr>
      <td>Execution time (s)</td>
      <td>: <?= microtime(true) - $starttime; ?></td>
    </tr>
  </table>


  <br>
  <a href="./../.."><button>Kembali</button></a>
</body>
</html>