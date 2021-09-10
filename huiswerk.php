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
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="wrapper">
    <?php include 'menu.php';?>
    <div class="wrapperitem2">
        <article>
            <h1>Huiswerk</h1>
            <?php 
            //Haal huiswerk op voor bepaalde student
            $huiswerk = $db->selectHomework($_SESSION["StudentId"]);

            //Loop door de array met verschillende huiswerkopdrachten
            foreach ($huiswerk as $opdracht) {
                //Maak DateTime object van de datum uit de database
                $datum = date_create($opdracht['HuiswerkDatum']);
                echo "<div class='huiswerkcontainer'>";
                echo "<h2>" . $opdracht['VakNaam'] . "</h2>";
                echo "<div class='opdracht'><span>" . $opdracht['HuiswerkBeschrijving'] . "</span><span>" . date_format($datum, 'Y-d-m') . "</div>";
                echo "</div>";
            }
            
            //Als er geen huiswerkopdrachten in de array zitten
            if ($huiswerk == null) {
                //Laat zien dat er geen huiswerk is
                echo "<h2>Geen huiswerk opgegeven!</h2>";
            }
            ?>
        </article>
    </div>

</body>

</html>