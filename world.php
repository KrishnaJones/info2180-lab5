<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $context = isset($_GET['context']) ? $_GET['context'] : '';

    switch ($context) {
        case 'cities':
            $country = ucwords(trim(filter_var($_GET['country'], FILTER_SANITIZE_STRING)));
            $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code  WHERE countries.name LIKE '%$country%' ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>District</th>
                    <th>Population</th>
                </tr>
                <tbody>
                    <?php foreach ($results as $city) : ?>
                        <tr>
                            <td><?= $city['name'] ?></td>
                            <td><?= $city['district'] ?></td>
                            <td><?= $city['population'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php break;

        default:
            $country = ucwords(trim(filter_var($_GET["country"], FILTER_SANITIZE_STRING)));
            $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%' ");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Continent</th>
                    <th>Independence</th>
                    <th>Head of State</th>
                </tr>
                <tbody>
                    <?php foreach ($results as $row) : ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['continent'] ?></td>
                            <td><?= $row['independence_year'] ?></td>
                            <td><?= $row['head_of_state'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    <?php
    }
}
?>
