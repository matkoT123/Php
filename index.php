<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('config.php');

try {
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $query = "SELECT * FROM person";

    $query = "SELECT person.name, person.surname, games.year, games.city, games.country, games.type, placement.discipline
    FROM placement
    JOIN person ON placement.person_id = person.id
    JOIN games ON placement.games_id = games.id;
    ";
    $stmt = $db->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>

    <title>Document</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Zadanie 1</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" href="index.php">Olympionici</a>
                        <a class="nav-link" href="bestAthlets.php">Top 10</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1 id="more">Olympionici</h1>


        <table class="table table-success table-striped" id="athletesTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Year</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Type</th>
                    <th>Discipline</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($results as $result) {
                    echo "<tr><td>" . $result["name"] .
                        "</td><td>" . $result["surname"] .
                        "</td><td>" . $result["year"] .
                        "</td><td>" . $result["city"] .
                        "</td><td>" . $result["country"] .
                        "</td><td>" . $result["type"] .
                        "</td><td>" . $result["discipline"] .
                        "</td></tr>";
                }
                ?>

            </tbody>
        </table>

        <script type="text/javascript" src="script.js?v=<?php echo time(); ?>"></script>

    </div>

</body>

</html>