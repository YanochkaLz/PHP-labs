<?php

$array1 = array();
$array2 = array();

for ($i = 10; $i <= 20; $i++) {
  $array1[] = $i ** 2;
}

for ($i = 1; $i <= 10; $i++) {
  $array1[] = $i ** 3;
}

$result = $array1 + $array2;

echo json_encode($result);