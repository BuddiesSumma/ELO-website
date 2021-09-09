<!DOCTYPE html>
<?php 
include_once './classes/ELOdb.php'; 
$db = new ELOdb();

//Start session
session_start();
//Als de sessionwaarde met StudentId al gezet is
if(isset($_SESSION["StudentId"])) {
    //Stuur gebruiker door naar de homepagina
    header('Location: ./home.php');
}
//Controleer of Username en password in de POST zijn gezet
else if (isset($_POST['uname']) && isset($_POST['psw']) ) {
    //Haal student op die bij de username hoort
    $student = $db->selectStudentByEmail($_POST['uname']);
    //Zet wachtwoord van de student in $password
    $password = $student['Wachtwoord'];

    //Als wachtwoord uit de database gelijk is aan het ingevoerde password
    if ($password == $_POST['psw']) {
        //Maak een session variabele met daarin de StudentId
        $_SESSION["StudentId"] = $student['StudentId'];
        //Stuur gebruiker door naar de homepagina
        header('Location: ./home.php');
    }
    else {
        //Laat foutmelding zien
        echo "onjuist wachtwoord!";
    }
}
?>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style.css">
    <title>Login</title>
</head>

<body>
    <form method="post">
        <div >
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
    </form>
</body>

</html>