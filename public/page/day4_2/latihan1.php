<?php
$mahasiswas = [3.6, 3.7, 2.8, 2.8, 3.1, "lulus", -1, 4.2];

function ipkToJudge($ipks)
{
  $judges = array();
  foreach ($ipks as $ipk) {
    switch (true) {
      case !is_numeric($ipk) || $ipk < 0 || $ipk > 4 :
        array_push($judges, "error");
        break;
      case $ipk <= 3:
        array_push($judges, "low");
        break;
      case $ipk > 3 && $ipk <= 3.5:
        array_push($judges, "medium");
        break;
      case $ipk > 3.5:
        array_push($judges, "high");
        break;
      default:
        array_push($judges, "error");
        break;
    }
  }
  return $judges;
}

echo json_encode($mahasiswas);
echo "<br>";
echo json_encode(ipkToJudge($mahasiswas));
