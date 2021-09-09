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

//Als GET logout gezet is
if (isset($_GET['logout'])){
    //Verwijder alle sessions
    session_destroy();
    //Stuur gebruiker door naar de loginpagina
    header('Location: ./');
}

//Haal persoonsgegevens op voor bepaalde student
$student = $db->selectStudentByStudentId($_SESSION["StudentId"]);
?>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Hallo <?php echo $student['Voornaam']; ?>!</h1>
    <a href="huiswerk.php">Huiswerk</a>
    <a href="cijfers.php">Cijfers</a>
    <a href="persoonsgegevens.php">Persoonsgegevens</a>
    <a href="?logout">Uitloggen</a>
</body>
</html>