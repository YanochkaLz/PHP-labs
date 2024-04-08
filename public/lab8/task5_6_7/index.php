<?php

class Calculator
{
  public function add($a, $b)
  {
    return $a + $b;
  }

  public function subtract($a, $b)
  {
    return $a - $b;
  }

  public function divide($a, $b)
  {
    if ($b == 0) {
      return "Помилка: ділення на нуль";
    }
    return $a / $b;
  }

  public function modulo($a, $b)
  {
    if ($b == 0) {
      return "Помилка: ділення на нуль";
    }
    return $a % $b;
  }

  public function squareRoot($a)
  {
    if ($a < 0) {
      return "Помилка: від'ємне число не має дійсного кореня";
    }
    return sqrt($a);
  }

  public function power($a, $b)
  {
    return pow($a, $b);
  }
}

class Dispatcher
{
  private $calculator;

  public function __construct(Calculator $calculator)
  {
    $this->calculator = $calculator;
  }

  public function display()
  {
    echo "<form action='' method='post'>";
    echo "<label for='num1'>Число 1:</label>";
    echo "<input type='number' id='num1' name='num1' required><br><br>";

    echo "<label for='num2'>Число 2:</label>";
    echo "<input type='number' id='num2' name='num2' required><br><br>";

    echo "<label for='operation'>Операція:</label>";
    echo "<select id='operation' name='operation'>";
    echo "<option value='add'>Додавання</option>";
    echo "<option value='subtract'>Віднімання</option>";
    echo "<option value='divide'>Ділення</option>";
    echo "<option value='modulo'>Ділення за модулем</option>";
    echo "<option value='squareRoot'>Корінь квадратний</option>";
    echo "<option value='power'>Піднесення до степеня</option>";
    echo "</select><br><br>";

    echo "<button type='submit' name='submit' value='calculate'>Розрахувати</button>";
    echo "</form>";
  }

  public function dispatch()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && $_POST["submit"] == "calculate") {
      $num1 = $_POST["num1"];
      $num2 = $_POST["num2"];
      $operation = $_POST["operation"];

      if (!is_numeric($num1) || !is_numeric($num2)) {
        return "Помилка: обидва аргументи повинні бути числами";
      }

      switch ($operation) {
        case "add":
          return $this->calculator->add($num1, $num2);
        case "subtract":
          return $this->calculator->subtract($num1, $num2);
        case "divide":
          return $this->calculator->divide($num1, $num2);
        case "modulo":
          return $this->calculator->modulo($num1, $num2);
        case "squareRoot":
          return $this->calculator->squareRoot($num1);
        case "power":
          return $this->calculator->power($num1, $num2);
        default:
          return "Невідома операція";
      }
    }
  }
}


$calculator = new Calculator();
$dispatcher = new Dispatcher($calculator);

$dispatcher->display();
$result = $dispatcher->dispatch();
if ($result !== null) {
  echo "Результат: $result";
}
