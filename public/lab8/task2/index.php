<?php
class Country
{
  private $name;
  private $population;
  private $capital;

  public function __construct($name, $capital, $population)
  {
    $this->name = $name;
    $this->population = $population;
    $this->capital = $capital;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getCapital()
  {
    return $this->capital;
  }

  public function getPopulation()
  {
    return $this->population;
  }
}

$countries = array(
  new Country("Україна", "Київ", 2804000),
  new Country("Франція", "Париж", 2148000),
  new Country("Німеччина", "Берлін", 3769000)
);

echo "<table border='1'>";
foreach ($countries as $country) {
  echo "<tr>";
  echo "<td>Назва:</td><td>{$country->getName()}</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Столиця:</td><td>{$country->getCapital()}</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>Населення:</td><td>{$country->getPopulation()}</td>";
  echo "</tr>";
  echo "<tr><td colspan='2'>&nbsp;</td></tr>";
}
echo "</table>";
