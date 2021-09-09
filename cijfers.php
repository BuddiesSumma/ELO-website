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
    <title>Cijfers</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div id="grid-container">
        <?php include 'menu.php'; ?>
        <div class="bar"></div>
        <main>
            <div class="info">
                <h1>Cijfers</h1>
            </div>
                <?php
                //Haal cijfers op van bepaalde student
                $cijfers = $db->selectGrades($_SESSION["StudentId"]);

                //Loop door de array met verschillende cijfers
                foreach ($cijfers as $cijfer) {
                    echo "<div class='info'>
                    <table class='cijfers'><tr class='vak'>";
                    echo "<td>" . $cijfer['VakNaam'] . "</td>";
                    echo "<td style='text-align: right'>" . $cijfer['Cijfer'] . "</td>";
                    echo "</tr></table></div>";
                }

                if ($cijfers == null) {
                    //Laat zien dat er geen cijfers beschikbaar zijn
                    echo "<div class='info'>";
                    echo "<h2>Geen cijfers ingevoerd!</h2>";
                    echo "</div>";
                }
                ?>
        </main>
    </div>
</body>

</html>