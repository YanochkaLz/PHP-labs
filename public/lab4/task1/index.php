<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Перевірка файлу</title>
</head>

<body>
  <h2>Перевірка файлу</h2>
  <form action="" method="post">
    <label for="filename">Ім'я файлу:</label>
    <input type="text" id="filename" name="filename" required><br><br>
    <button type="submit" name="submit">Готово</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];

    if (file_exists($filename)) {
      echo "<h3>Файл $filename існує.</h3>";
      echo "<p>Розмір: " . filesize($filename) . " байт</p>";
      echo "<p>Час створення: " . date("Y-m-d H:i:s", filectime($filename)) . "</p>";
      echo "<p>Час останньої модифікації: " . date("Y-m-d H:i:s", filemtime($filename)) . "</p>";
      echo "<p>Вміст файлу:</p>";
      echo "<pre>" . file_get_contents($filename) . "</pre>";
    } else {
      echo "<h3>Файл з іменем $filename у поточному каталозі не існує.</h3>";
    }
  }
  ?>
</body>

</html>