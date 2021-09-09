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
    <title>Huiswerk</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div id="grid-container">
        <?php include 'menu.php'; ?>
        <div class="bar"></div>
        <main>
            <div class="info">
                <h1>Huiswerk</h1>
            </div>
            <?php
            //Haal huiswerk op voor bepaalde student
            $huiswerk = $db->selectHomework($_SESSION["StudentId"]);

            //Loop door de array met verschillende huiswerkopdrachten
            foreach ($huiswerk as $opdracht) {
                //Maak DateTime object van de datum uit de database
                $datum = date_create($opdracht['HuiswerkDatum']);
                // //Laat voor elk vak de naam, beschrijving van de taak en deadline zien
                // echo "<tr><td><h2>" . $opdracht['VakNaam'] . "</td>";
                // echo "<p>" . $opdracht['HuiswerkBeschrijving'] . "</p>";
                // echo "<p>Deadline: " . date_format($datum, 'Y-d-m') . "</p></div>";
                echo "<div class='info'>";
                echo "<table class='opdracht'>";
                echo "<tr><td><h2>" . $opdracht['VakNaam'] . "</h2></td><td></td></tr>";
                echo "<tr><td>" . $opdracht['HuiswerkBeschrijving'] . "</td><td style='text-align: right'>" . date_format($datum, 'Y-d-m') . "</td></tr>";
                echo "</table></div>";
            }

            //Als er geen huiswerkopdrachten in de array zitten
            if ($huiswerk == null) {
                //Laat zien dat er geen huiswerk is
                echo "<div class='info'>";
                echo "<h2>Geen huiswerk opgegeven!</h2>";
                echo "</div>";
            }
            ?>
        </main>
    </div>
</body>

</html>