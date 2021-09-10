<!DOCTYPE html>
<?php
include_once './classes/ELOdb.php';
$db = new ELOdb();

//Start session
session_start();
//Als StudentId niet gezet is
if (!isset($_SESSION["StudentId"])) {
    //Stuur door naar de loginpagina
    header('Location: ./');
    //Stop met uitvoeren
    die();
}

//Als GET logout gezet is
if (isset($_GET['logout'])) {
    //Verwijder alle sessions
    session_destroy();
    //Stuur gebruiker door naar de loginpagina
    header('Location: ./');
}
?>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="wrapper">
    <?php include 'menu.php';?>
    <div class="wrapperitem2">
        <article>
        <h1>Cijferlijst</h1>
        <?php
                //Haal cijfers op van bepaalde student
                $cijfers = $db->selectGrades($_SESSION["StudentId"]);

                if($cijfers != null) {
                    echo "<table class='cijfers'>";
                    //Loop door de array met verschillende cijfers
                    foreach ($cijfers as $cijfer) {
                        echo "<tr>";
                        echo "<td>" . $cijfer['VakNaam'] . "</td>";
                        echo "<td style='text-align: right;'>" . $cijfer['Cijfer'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                if ($cijfers == null) {
                    //Laat zien dat er geen cijfers beschikbaar zijn
                    echo "<h2>Geen cijfers ingevoerd!</h2>";
                }
                ?>
        </article>
    </div>

</body>

</html>