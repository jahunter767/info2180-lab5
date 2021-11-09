<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",
          $username, $password);

$query = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$context = filter_input(INPUT_GET, "context", FILTER_SANITIZE_STRING);

if ($context == "city"):
  $sqlquery = "SELECT city.name, city.district, city.population FROM " .
    "(SELECT code FROM countries " .
      "WHERE name LIKE '$query') as cntry " .
    "JOIN (SELECT * FROM cities) as city " .
    "ON city.country_code = cntry.code;";
  $stmt = $conn->query($sqlquery);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <table>
    <thead>
      <tr>
        <td>Name</td>
        <td>District</td>
        <td>Population</td>
      </tr>
    </thead>
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['district'] ?></td>
        <td><?= $row['population'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php else:
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$query%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
  <table>
    <thead>
      <tr>
        <td>Name</td>
        <td>Continent</td>
        <td>Independence Year</td>
        <td>Head of State</td>
      </tr>
    </thead>
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['continent'] ?></td>
        <td><?= $row['independence_year'] ?></td>
        <td><?= $row['head_of_state'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>
