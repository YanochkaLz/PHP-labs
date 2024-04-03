<?php

echo '<h1>Виконання порівняння двох чисел</h1>';

$number1 = (float)($_POST['num1']);
$number2 = (float)($_POST['num2']);

if ($number1 > $number2) {
  echo "<p>Число " . $number1 . " більше за число " . $number2 . "</p>";
} else if ($number2 > $number1) {
  echo "<p>Число " . $number2 . " більше за число " . $number1 . "</p>";
} else {
  echo 'Обидва числа рівні ' . $number1;
}
