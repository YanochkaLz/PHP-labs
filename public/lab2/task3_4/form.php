<?php

$login = $_POST['login'];
$password = $_POST['password'];

$users = array(
  "log1" => array("Рамський Петре Івановичу", "pass1"),
  "log2" => array("Римський Федір Дмитровичу", "pass2"),
  "log3" => array("Рамська Аліна Сергіївна", "pass3"),
  "log4" => array("Римська Оксана Василівна", "pass4")
);

if (array_key_exists($login, $users)) {
  $name = $users[$login][0];
  $pswd = $users[$login][1];

  switch ($login) {
    case 'log1':
      if ($password === $pswd) {
        echo "<p>Доброго дня, $name!</p>";
      } else {
        echo "<p>Введений неправильний пароль для користувача $name.</p>";
      }
      break;
    case 'log2':
      if ($password === $pswd) {
        echo "<p>Доброго дня, $name!</p>";
      } else {
        echo "<p>Введений неправильний пароль для користувача $name.</p>";
      }
      break;
    case 'log3':
      if ($password === $pswd) {
        echo "<p>Доброго дня, $name!</p>";
      } else {
        echo "<p>Введений неправильний пароль для користувача $name.</p>";
      }
      break;
    case 'log4':
      if ($password === $pswd) {
        echo "<p>Доброго дня, $name!</p>";
      } else {
        echo "<p>Введений неправильний пароль для користувача $name.</p>";
      }
      break;
    default:
      echo "<p>Вибачте, ви у нас не зареєстровані.</p>";
      break;
  }
} else {
  echo "<p>Вибачте, ви у нас не зареєстровані.</p>";
}
