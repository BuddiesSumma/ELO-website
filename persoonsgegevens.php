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
//Haal persoonsgegevens op voor bepaalde student
$student = $db->selectStudentByStudentId($_SESSION["StudentId"]);
?>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persoonsgegevens</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="persinfo">
        <h2> Persoonlijke gegevens</h2>

            <table class="table1">
                <tr> 
                    <td class="kopjes">Naam</td>
                </tr>
                <tr>
                    <td><?php echo $student['Voornaam'] . " " . $student['Achternaam'];?></td></th>
                </tr>
                <tr>
                    <td class="kopjes">Geboortedatum</td>
                </tr>
                <tr>
                    <td><?php echo $student['Geboortedatum'];?></td>
                </tr>
                <tr>
                    <td class="kopjes">Studentnummer</td>
                </tr>
                <tr>
                    <td><?php echo $student['StudentId'];?></td>
                </tr>
            </table>
    </div>

    <div class="persinfo">
        <h2> Contactgegevens</h2>

            <table class="table1">
                <tr> 
                    <td class="kopjes">Telefoonnummer</td>
                </tr>
                <tr>
                    <td><?php echo $student['Telefoonnummer'];?></td>
                </tr>
                <tr>
                    <td class="kopjes">E-mail</td>
                </tr>
                <tr>
                    <td><?php echo $student['Email'];?></td>
                </tr>
            </table>
    </div>

    <div class="persinfo">
        <h2> Adressen</h2>

            <table class="table1">
                <tr> 
                    <td class="kopjes">Adres</td>
                </tr>
                <tr>
                    <td>
                        <?php echo $student['Adres'];?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $student['Postcode'] . " " . $student['Woonplaats'];?>
                    </td>
                </tr>
                <tr>
                    <td class="kopjes">Adres school</td>
                </tr>
                <tr>
                    <td>Sterrenlaan 10</td>
                </tr>
                <tr>
                    <td>5631 KA Eindhoven</td>
                </tr>
            </table>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2485.54838084974!2d5.49421141576846!3d51.46644777962846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6d8d3f3dacee7%3A0x1acd712bb57b8792!2sSterrenlaan%2010%2C%205631%20KA%20Eindhoven!5e0!3m2!1snl!2snl!4v1631090062103!5m2!1snl!2snl" width="100%" height="300" style="border:0px;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</body>
</html>