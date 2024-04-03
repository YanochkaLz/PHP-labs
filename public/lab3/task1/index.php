<?php

$numbers = [5, 8, 99, 1, 0];

foreach ($numbers as $number) {
  $square = $number * $number;
  echo "$number | $number^2 = $square<br>";
}