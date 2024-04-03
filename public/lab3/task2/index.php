<?php

$countries = [
  "Україна" => ["Населення" => 44000000, "Столиця" => "Київ"],
  "Сполучені Штати Америки" => ["Населення" => 331000000, "Столиця" => "Вашингтон"],
  "Франція" => ["Населення" => 67000000, "Столиця" => "Париж"],
];

echo "<h3>Таблиця 3x2:</h3>";
echo "<table border='1'>";
foreach ($countries as $country => $data) {
  echo "<tr><td>$country</td><td>".implode(', ', $data)."</td></tr>";
}
echo "</table>";

echo "<h3>Таблиця 2x3:</h3>";
echo "<table border='1'>";
$keys = array_keys($countries);
$values = array_values($countries);

echo "<tr>";
foreach ($keys as $key) {
  echo "<td>$key</td>";
}
echo "</tr>";

echo "<tr>";
foreach ($values as $v) {
  echo "<td>".implode(', ', $v)."</td>";
}
echo "</tr>";

echo "</table>";
