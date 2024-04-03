<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php if (empty($message) || strpos($message, "неправильне") !== false) { ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <label for="start">Введіть початкове число бактерій:</label>
      <input type="number" id="start" name="start" required><br>
      <label for="end">Введіть кінцеве число бактерій:</label>
      <input type="number" id="end" name="end" required><br><br>
      <button type="submit">Порахувати</button>
    </form>
    <br>
    <br>
  <?php } ?>

  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start = (int)$_POST['start'];
    $end = (int)$_POST['end'];
    $counter = 0;

    if ($start > $end) {
      return;
    }

    do {
      $counter++;
      $start *= 2;
      echo "$counter. минулa $counter год. - маємо $start бактерій.<br>";
    } while ($start <= $end);
  }
  ?>
</body>

</html>