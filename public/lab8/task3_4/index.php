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
    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="surname">Прізвище:</label>
    <input type="text" id="surname" name="surname" required><br><br>

    <label for="age">Вік:</label>
    <input type="number" id="age" name="age" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <br><br>
    <button type="submit" name="submit" value="registration">Готово</button>
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

  class User
  {
    public $name;
    public $surname;
    public $age;
    public $email;

    public function __construct($name, $surname, $age, $email)
    {
      $this->name = $name;
      $this->surname = $surname;
      $this->age = $age;
      $this->email = $email;
    }

    public function __toString()
    {
      return $this->name . " | " . $this->surname . " | " . $this->age . " | " . $this->email;
    }
  }


  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && $_POST["submit"] == "registration") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $age = $_POST["age"];
    $email = $_POST["email"];

    if ($name && $surname && $age && $email) {
      $user = new User($name, $surname, $age, $email);

      echo $user;
      outputSuccess("Користувач успішно доданий.");
    }
  }

  ?>
</body>

</html>