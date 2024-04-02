<?php

// 2
$rows = 5;
$columns = 3;
echo '<html><body>';
echo '<div style="text-align: center">';
echo '<table border="2" style="margin: 0 auto">';
for ($i = 1; $i <= $rows; $i++) {
  echo '<tr>';
  for ($j = 1; $j <= $columns; $j++) {
    if (($i + $j) % 2 == 0) {
      $c = "green";
    } else {
      $c = "red";
    }
    echo '<td bgcolor=' . $c . '><font color="yellow">' . $i, $j . '</font></td>';
  }
  echo '</tr>';
}
echo '</table>';

// 4
echo '</br>';
echo "<h1>Виконуємо завдання лабораторної роботи № 1 !!!</h1>";

// 5
$developer_info_file = 'my_info.txt';
if (file_exists($developer_info_file)) {
  echo '<p>' . file_get_contents($developer_info_file) . '</p>';
} else {
  echo 'Файл із інформацією про розробника не знайдено.';
}

// 6
$colors = array(
  "Червоний" => "#FF0000",
  "Зелений" => "#00FF00",
  "Синій" => "#0000FF",
  "Жовтий" => "#FFFF00",
  "Фіолетовий" => "#800080",
  "Блакитний" => "#00FFFF",
  "Білий" => "#FFFFFF",
  "Чорний" => "#000000"
);

echo '<table style="margin: 0 auto">';

foreach ($colors as $color => $hex) {
  $rgb = sscanf($hex, "#%02x%02x%02x");
  $rgb_string = implode(", ", $rgb);

  echo "<tr>";
  echo "<td style='background-color: $hex;'>$color</td>";
  echo "<td>$hex</td>";
  echo "<td>RGB($rgb_string)</td>";
  echo "</tr>";
}

echo '</table>';
echo '<br>';

// 7
echo '<table style="margin: 0 auto">';
for ($i = 1; $i <= 9; $i++) {
  echo '<tr>';
  for ($j = 1; $j <= 9; $j++) {
    echo '<td>'.$j.'*'.$i.'='.$i*$j.'</td>';
  }
  echo '</tr>';
}
echo '</table>';
echo '<br>';

// 3
echo phpinfo(INFO_ALL);
echo '</div >';
echo '</body></html>';
