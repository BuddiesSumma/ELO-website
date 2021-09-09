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
    <title>Cijfers</title>
</head>
<body>
    <h1>Cijfers</h1>
    <table>
    <?php 
    //Haal cijfers op van bepaalde student
    $cijfers = $db->selectGrades($_SESSION["StudentId"]);
    
    //Loop door de array met verschillende cijfers
    foreach($cijfers as $cijfer) {
        echo "<tr>";
        echo "<td>" . $cijfer['VakNaam'] . "</td>";
        echo "<td style='text-align: right'>" . $cijfer['Cijfer'] . "</td>";
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>