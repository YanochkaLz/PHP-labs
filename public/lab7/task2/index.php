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

    .container {
      display: flex;
      gap: 100px;
    }
  </style>
</head>

<body>
  <div class="container">
    <form action="" method="post">
      <label for="name">Назва:</label>
      <input type="text" id="name" name="name" required><br><br>

      <label for="article">Статья:</label>
      <input type="text" id="article" name="article" required><br><br>

      <button type="submit" name="notes" value="notes">Додати примітку</button>
    </form>
    <form action="" method="post">
      <label for="author">Автор:</label>
      <input type="text" id="author" name="author" required><br><br>

      <label for="comment">Коментарій:</label>
      <input type="text" id="comment" name="comment" required><br><br>

      <label for="art_Id">Id примітки:</label>
      <input type="number" id="art_Id" name="art_Id" required><br><br>

      <button type="submit" name="comment" value="comment">Додати коментарій</button>
    </form>
  </div>
  <?php

  $dbhost  = "db";
  $dbuser  = "root";
  $dbpassword  = "your_root_password";
  $dbname  = "MySiteDB";

  $link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname, 3306);
  function outputError($message)
  {
    echo "<p class='error'>$message</p>";
  }

  function outputSuccess($message)
  {
    echo "<p class='success'>$message</p>";
  }

  function getAllComments($link)
  {
    $query = "SELECT * FROM Comments";
    $result = mysqli_query($link, $query);

    if (!$result) {
      outputError("Помилка при виконанні запиту: " . mysqli_error($link));
    } else {
      echo "<h2>Comments</h2>";
      echo "<table border='1'>";
      echo "<tr><th>Id</th><th>Created</th><th>Author</th><th>Comment</th><th>Art_Id</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['Created'] . "</td>";
        echo "<td>" . $row['Author'] . "</td>";
        echo "<td>" . $row['Comment'] . "</td>";
        echo "<td>" . $row['Art_Id'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
      mysqli_free_result($result);
    }
  }

  function getAllNotes($link)
  {
    $query = "SELECT * FROM Notes";
    $result = mysqli_query($link, $query);

    if (!$result) {
      outputError("Помилка при виконанні запиту: " . mysqli_error($link));
    } else {
      echo "<h2>Notes</h2>";
      echo "<table border='1'>";
      echo "<tr><th>Id</th><th>Created</th><th>Title</th><th>Article</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['Created'] . "</td>";
        echo "<td>" . $row['Title'] . "</td>";
        echo "<td>" . $row['Article'] . "</td>";
        echo "<td><form method='post'><input type='hidden' name='comment_id' value='" . $row['Id'] . "'><button type='submit' name='delete_comment' value='delete'>Видалити</button></form></td>";
        echo "</tr>";
      }
      echo "</table>";
      mysqli_free_result($result);
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["notes"]) && $_POST["notes"] == "notes") {
    $name = $_POST["name"];
    $article = $_POST["article"];

    if (!$link) {
      outputError("Помилка з'єднання: " . mysqli_connect_error());
    } else {
      $created = date('Y-m-d H:i:s');
      $query = "INSERT INTO Notes (Title, Article, Created) VALUES ('$name', '$article', '$created')";

      if (mysqli_query($link, $query)) {
        outputSuccess("Новий запис успішно додано до таблиці Notes.");
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit();
      } else {
        outputError("Помилка при виконанні запиту:: " . mysqli_error($link));
      }
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment"]) && $_POST["comment"] == "comment") {
    $author = $_POST["author"];
    $comment = $_POST["comment"];
    $art_Id = $_POST["art_Id"];

    if (!$link) {
      outputError("Помилка з'єднання: " . mysqli_connect_error());
    } else {
      $created = date('Y-m-d H:i:s');
      $query = "INSERT INTO Comments (Comment, Author, Created, Art_Id) VALUES ('$comment', '$author', '$created', '$art_Id')";

      if (mysqli_query($link, $query)) {
        outputSuccess("Новий запис успішно додано до таблиці Comments.");
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit();
      } else {
        outputError("Помилка при виконанні запиту:: " . mysqli_error($link));
      }
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_comment"]) && $_POST["delete_comment"] == "delete") {
    $comment_id = $_POST["comment_id"];

    if (!$link) {
      outputError("Помилка з'єднання: " . mysqli_connect_error());
    } else {
      $query = "DELETE FROM Notes WHERE Id = '$comment_id'";

      if (mysqli_query($link, $query)) {
        outputSuccess("Коментар успішно видалено.");
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit();
      } else {
        outputError("Помилка при виконанні запиту: " . mysqli_error($link));
      }
    }
  }

  getAllNotes($link);
  getAllComments($link);
  mysqli_close($link);
  ?>
</body>

</html>