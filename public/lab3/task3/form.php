<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $data = array(
    "Прізвище" => $_POST["surname"],
    "Ім'я" => $_POST["name"],
    "Вік" => $_POST["age"],
    "Email" => $_POST["email"]
  );

  echo "<table border='1'>";
  foreach ($data as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
  }
  echo "</table>";
}
