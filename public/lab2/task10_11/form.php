<?php

$start = (int)$_POST['num1'];
$end = (int)$_POST['num2'];
$n = 10;

if($start > $end){
  $tmp = $start;
  $start = $end;
  $end = $tmp;
}

echo '<table border="2" style="margin: 0 auto">';

while ($start <= $end) {
  if ($start === 0) {
    break;
  }
  $output = $n . " / " . $start . " = " . $n / $start;
  echo "<tr><td>" . $output . "</td></tr>";
  $start++;
}

echo '</table>';
