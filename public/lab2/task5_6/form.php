<?php

$number = $_POST['num'];
$result = "";

if ($number % 2 === 0) {
  $result .= 'Число парне';
} else {
  $result .= 'Число непарне';
}

if ($number == intval($number)) {
  $result .= " та є цілим.";
} else {
  $result .= " та не є цілим.";
}

echo $result;
