<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Гра: відгадай число</title>
  <style>
    .error {
      color: red;
      font-weight: bold;
    }

    .success {
      color: green;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <h1>Гра: відгадай число</h1>
  <?php
  $secret_number = 42;
  $message = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guess = $_POST['guess'];

    if ($guess == $secret_number) {
      $message = "<p class='success'>Число $guess відгадане правильно! Вітання!</p>";
    } else {
      $message = "<p class='error'>Число $guess неправильне.";
      if ($guess > $secret_number) {
        $message .= " Загадане число менше.</p>";
      } else {
        $message .= " Загадане число більше.</p>";
      }
    }
    echo $message;
  }
  ?>


  <?php if (empty($message) || strpos($message, "неправильне") !== false) { ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <label for="guess">Введіть ваше число:</label>
      <input type="text" id="guess" name="guess" required><br><br>
      <button type="submit">Перевірка</button>
    </form>
  <?php } ?>
</body>

</html>