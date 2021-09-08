<!DOCTYPE html>
<?php 
include_once './classes/ELOdb.php'; 
$db = new ELOdb();

session_start();
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
    //Haal huiswerk op voor bepaalde student (nummer nog te vervangen voor doorgegeven studentId)
    $huiswerk = $db->selectHomework($_SESSION["StudentId"]);
    
    //Loop door de array met verschillende huiswerkopdracht
    foreach($huiswerk as $opdracht) {
        //Laat voor elk vak de naam, beschrijving van de taak en deadline zien
        echo "<div><h2>" . $opdracht['VakNaam'] . "</h2>";
        echo "<p>" . $opdracht['HuiswerkBeschrijving'] . "</p>";
        echo "<p>Deadline: " . $opdracht['HuiswerkDatum'] . "</p></div>";
    } 

    //Als er geen huiswerkopdrachten in de array zitten
    if ($huiswerk == null) {
        //Laat zien dat er geen huiswerk is
        echo "<h2>Geen huiswerk opgegeven!</h2>";
    }
    ?>
</body>
</html>