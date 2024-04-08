<?php
class MultiplicationTable
{
  private $number;

  public function __construct($number)
  {
    $this->number = $number;
  }

  public function generateTable()
  {
    echo "<h2>Таблиця множення для числа {$this->number}</h2>";
    echo "<table border='1'>";
    for ($i = 1; $i <= 10; $i++) {
      echo "<tr>";
      echo "<td>{$this->number}</td>";
      echo "<td>*</td>";
      echo "<td>{$i}</td>";
      echo "<td>=</td>";
      echo "<td>" . ($this->number * $i) . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
}

$multiTable3 = new MultiplicationTable(3);
$multiTable3->generateTable();

$multiTable5 = new MultiplicationTable(5);
$multiTable5->generateTable();
