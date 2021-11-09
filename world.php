<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",
          $username, $password);

$query = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);

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
