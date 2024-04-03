<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Таблиця тегів</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h2>Таблиця тегів</h2>
  <table>
    <tr>
      <th>Тег</th>
      <th>Опис</th>
    </tr>
    <?php
    $file = fopen("tags.txt", "r");
    $counter = 0;

    while (!feof($file)) {
      $tag = fgets($file);
      $description = fgets($file);

      $counter++;

      echo "<tr>";
      echo "<td><b>&lt$tag&gt</b></td>";
      echo "<td>$description</td>";
      echo "</tr>";
    }

    fclose($file);
    echo "<h3>Всього у файлі описано тегів: $counter</h3>";
    ?>
  </table>
</body>

</html>