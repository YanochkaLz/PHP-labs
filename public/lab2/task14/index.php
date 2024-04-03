<?php

function multiplicationTable($value)
{
  for ($i = 2; $i <= 9; $i++) {
    echo '<td>' . $i . '*' . $value . '=' . $i * $value . '</td>';
  }
}

echo '<table border="2" style="margin: 0 auto">';
for ($j = 1; $j <= 10; $j++) {
  echo '<tr>';
  multiplicationTable($j);
  echo '</tr>';
}
echo '</table>';
