<?php
// Operation : 1 + (1 * n) + 1 = n + 2
// Big O : O(n)
function cara1($n)
{
  $sum = 0;   //  1
  for ($i = $n; $i > 0; $i--) {  // *n
    $sum += $i;   // 1
  }
  return $sum; // 1
}

// 
// 
function cara2($n)
{
  return ($n * $n + $n) / 2; // 
}


// Operation : 4
// Big O : O(1)
function cara3($n)
{
  return ($n + 1) * $n / 2; // 4
}
