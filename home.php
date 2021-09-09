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

//Haal persoonsgegevens op voor bepaalde student
$student = $db->selectStudentByStudentId($_SESSION["StudentId"]);
?>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div id="grid-container">
        <?php include 'menu.php'; ?>
        <div class="bar"></div>
        <main>
            <div class="info">
                <h1>Hallo <?php echo $student['Voornaam']; ?>!</h1>
            </div>

            <article class="info">
                <h2>Titel</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fermentum dui auctor, tristique erat in, euismod dui. Sed vitae mi vel erat finibus scelerisque sit amet eu mauris. Nunc varius condimentum risus in vehicula. Vestibulum tempus massa sit amet mauris finibus hendrerit. Duis dui libero, commodo quis iaculis vel, tristique at nunc. Aliquam luctus leo ut nulla tincidunt bibendum. Pellentesque eleifend congue odio, sit amet faucibus velit volutpat et. Maecenas facilisis tempus mi, non congue lectus tristique quis. Aliquam id tempor eros. Cras maximus ornare iaculis. Curabitur dui nisl, auctor ut quam eu, finibus congue ante. Vestibulum lorem eros, blandit egestas tempor ut, vehicula ut felis. Maecenas blandit tellus quam, ac luctus ante hendrerit malesuada. Maecenas nec varius odio. Donec quis libero mauris.
                </p>
            </article>

            <article class="info">
                <h2>Titel</h2>
                <p>
                    In sed erat molestie, convallis diam quis, fringilla augue. Nulla facilisi. Quisque bibendum pellentesque justo quis tristique. Quisque vestibulum efficitur condimentum. Sed elementum venenatis tincidunt. Sed eu metus eu arcu malesuada maximus porta nec urna. Cras augue ante, mollis a velit a, posuere suscipit nibh.
                </p>
            </article>
        </main>
    </div>
</body>

</html>