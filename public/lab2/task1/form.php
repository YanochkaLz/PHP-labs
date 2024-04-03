<?php

echo '<h1>Виконання арифметичних операцій</h1>';

$number1 = (float)($_POST['num1']);
$number2 = (float)($_POST['num2']);

echo "<p>$number1 + $number2 = " . ($number1 + $number2) . "</p>";
echo "<p>$number1 - $number2 = " . ($number1 - $number2) . "</p>";
echo "<p>$number1 * $number2 = " . ($number1 * $number2) . "</p>";

if ($number2 != 0) {
  echo "<p>$number1 / $number2 = " . ($number1 / $number2) . "</p>";
  echo "<p>$number1 % $number2 = " . ($number1 % $number2) . "</p>";
} else {
  echo "<p>Остача від ділення, ділення на нуль неможливе.</p>";
}
