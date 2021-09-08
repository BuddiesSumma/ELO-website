<!DOCTYPE html>
<?php 
include_once './classes/ELOdb.php'; 
$db = new ELOdb();
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
    <?php
    //Controleer of Username en password in de POST zijn gezet
    if (isset($_POST['uname']) && isset($_POST['psw']) ) {

        //Haal wachtwoord op die bij de username hoort
        $password = $db->selectPassword($_POST['uname']);
        
        var_dump($password);
        var_dump($_POST['psw']);

        //Als wachtwoord uit de database gelijk is aan het ingevoerde password
        if ($password[0] == $_POST['psw']) {
            header('Location: ./home.php');
        }
    }
    
    ?>
    <form method="post">
        <div >
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="text" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
    </form>
</body>

</html>