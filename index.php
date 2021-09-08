<!DOCTYPE html>
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
    if (isset($_POST['uname']) && isset($_POST['psw']) ) {
        $username = $_POST['uname'];
        $password = $_POST['psw'];

    if ($username == "Piet" && $password == "PSW" ) {
        header('Location: /loginpagina/home.php');
    }
    }
    
    ?>
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