<!DOCTYPE html>
<?php 
include_once './classes/ELOdb.php'; 
$db = new ELOdb();

//Start session
session_start();
//Als StudentId niet gezet is
if(!isset($_SESSION["StudentId"])) {
    //Stuur door naar de loginpagina
    header('Location: ./');
    //Stop met uitvoeren
    die();
}
?>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huiswerk</title>
</head>
<body>
    <h1>Huiswerk</h1>
    <?php 
    //Haal huiswerk op voor bepaalde student
    $huiswerk = $db->selectHomework($_SESSION["StudentId"]);

    //Loop door de array met verschillende huiswerkopdrachten
    foreach($huiswerk as $opdracht) {
        //Maak DateTime object van de datum uit de database
        $datum = date_create($opdracht['HuiswerkDatum']);
        //Laat voor elk vak de naam, beschrijving van de taak en deadline zien
        echo "<div><h2>" . $opdracht['VakNaam'] . "</h2>";
        echo "<p>" . $opdracht['HuiswerkBeschrijving'] . "</p>";
        echo "<p>Deadline: " . date_format($datum, 'Y-d-m') . "</p></div>";
    } 

    //Als er geen huiswerkopdrachten in de array zitten
    if ($huiswerk == null) {
        //Laat zien dat er geen huiswerk is
        echo "<h2>Geen huiswerk opgegeven!</h2>";
    }
    ?>
</body>
</html>