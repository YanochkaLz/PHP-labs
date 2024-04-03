<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
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
  <form action="" method="post">
    <label for="login">Логін:</label>
    <input type="login" id="filename" name="login" required><br><br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit" name="submit" value="login">Вхід</button>
    <button type="submit" name="submit" value="registration">Реєстрація</button>
  </form>

  <?php
  function outputError($message)
  {
    echo "<p class='error'>$message</p>";
  }

  function outputSuccess($message)
  {
    echo "<p class='success'>$message</p>";
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $action = $_POST["submit"];

    if ($action == "login") {
      if (file_exists($login)) {
        if (file_get_contents($login) == $password) {
          outputSuccess("Доброго дня, $login!");
        } else {
          outputError("Пароль не правильний!");
        }
      } else {
        outputError("Такий користувач не зареєстрований!");
      }
    } elseif ($action == "registration") {
      if (file_exists($login)) {
        outputError("Такий користувач вже існує!");
      } else {
        file_put_contents($login, $password);
      }
    }
  }
  ?>
</body>

</html>