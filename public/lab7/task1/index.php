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
    <input type="text" id="login" name="login" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="birthDate">Дата народження:</label>
    <input type="date" id="birthDate" name="birthDate" required><br><br>

    <label for="gender">Стать:</label>
    <select id="gender" name="gender">
      <option value="male">Чоловіча</option>
      <option value="female">Жіноча</option>
      <option value="other">Інше</option>
    </select><br><br>

    <label for="country">Країна:</label>
    <input type="text" id="country" name="country" required><br><br>

    <label for="email">Електронна пошта:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="note">Примітка:</label>
    <input type="text" id="note" name="note" required><br><br>

    <br><br>
    <button type="submit" name="submit" value="registration">Реєстрація</button>
  </form>

  <?php

  $dbhost  = "db";
  $dbuser  = "root";
  $dbpassword  = "your_root_password";
  $dbname  = "yana";

  $link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname, 3306);
  function outputError($message)
  {
    echo "<p class='error'>$message</p>";
  }

  function outputSuccess($message)
  {
    echo "<p class='success'>$message</p>";
  }

  function getAllUsers($link)
  {
    $query = "SELECT * FROM Kor";
    $result = mysqli_query($link, $query);

    if (!$result) {
      outputError("Помилка при виконанні запиту: " . mysqli_error($link));
    } else {
      echo "<br><br><table border='1'>";
      echo "<tr><th>Логін</th><th>Ім'я</th><th>Дата народження</th><th>Стать</th><th>Країна</th><th>Email</th><th>Примітка</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['login'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['birthDate'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['country'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['note'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
      mysqli_free_result($result);
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && $_POST["submit"] == "registration") {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $birthDate = $_POST["birthDate"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $email = $_POST["email"];
    $note = $_POST["note"];

    if (!$link) {
      outputError("Помилка з'єднання: " . mysqli_connect_error());
    } else {
      $query = "INSERT INTO Kor (login, password, name, birthDate, gender, country, email, note) 
                  VALUES ('$login', '$password', '$name', '$birthDate', '$gender', '$country', '$email', '$note')";

      if (mysqli_query($link, $query)) {
        outputSuccess("Користувач успішно доданий до бази даних.");
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit();
      } else {
        outputError("Помилка при виконанні запиту:: " . mysqli_error($link));
      }
    }
  }

  getAllUsers($link);
  mysqli_close($link);
  ?>
</body>

</html>