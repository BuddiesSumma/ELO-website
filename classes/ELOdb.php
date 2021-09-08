<?php
 class ELOdb {
    //Database adres en login credentials
    const DSN = "mysql:host=localhost;dbname=elo;charset=utf8";
    const USER = "root";
    const PASSWD = ""; 

    //Selecteer wachtwoord
    function selectPassword($username) {
        try {
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);

            //Maak nieuwe SQL query
            $statement = $pdo->prepare("SELECT `wachtwoord` FROM `student` WHERE `email` = :username");

            //Koppel parameter
            $statement->bindValue(":username", $username, PDO::PARAM_STR);

            //Voer statement uit
            $statement->execute();

            //Zorg dat data als associative array in $rows komt te staan
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            //Geef eerste van rows terug
            if($rows != null) {
            return $rows[0];
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>