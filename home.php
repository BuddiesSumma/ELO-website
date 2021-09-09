<!DOCTYPE html>
<?php 
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
?>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Hallo!</h1>
    <a href="huiswerk.php">Huiswerk</a>
    <a href="cijfers.php">Cijfers</a>
    <a href="persoonsgegevens.php">Persoonsgegevens</a>
    <a href="?logout">Uitloggen</a>
</body>
</html>