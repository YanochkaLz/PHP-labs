<?php

$number = (int)$_POST['num'];

$rows = 10;

echo '<table border="2" style="margin: 0 auto">';

for ($i = 1; $i <= $rows; $i++) {
  echo '<tr>';
  if ($i % 2 == 0) {
    $c = "orange";
  } else {
    $c = "yellow";
  }
  $output = $number . " * " . $i . " = " . $number * $i;
  echo '<td bgcolor=' . $c . '><font color="purple">' . $output . '</font></td>';
  echo '</tr>';
}

echo '</table>';

