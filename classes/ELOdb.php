<?php
 class ELOdb {
    //Database adres en login credentials
    const DSN = "mysql:host=localhost;dbname=elo;charset=utf8";
    const USER = "root";
    const PASSWD = ""; 

    //Selecteer wachtwoord
    function selectStudentByEmail($username) {
        try {
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);

            //Maak nieuwe SQL query
            $statement = $pdo->prepare("SELECT * FROM `student` WHERE `email` = :username");

            //Koppel parameter
            $statement->bindValue(":username", $username, PDO::PARAM_STR);

            //Voer statement uit
            $statement->execute();

            //Zorg dat data als associative array in $rows komt te staan
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            //Geef eerste van rows terug
            if($rows != null)
                return $rows[0];
            }
        catch (PDOException $e) {
            return false;
        }
    }

    function selectStudentByStudentId($studentId) {
        try {
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);

            //Maak nieuwe SQL query
            $statement = $pdo->prepare("SELECT * FROM `student` WHERE `studentId` = :studentId");

            //Koppel parameter
            $statement->bindValue(":studentId", $studentId, PDO::PARAM_STR);

            //Voer statement uit
            $statement->execute();

            //Zorg dat data als associative array in $rows komt te staan
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $rows[0];
        }
        catch (PDOException $e) {
            return false;
        }
    }

    function selectHomework($studentId) {
        try {
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);

            //Maak nieuwe SQL query
            $statement = $pdo->prepare("SELECT huiswerk.HuiswerkBeschrijving, huiswerk.HuiswerkDatum, vak.VakNaam FROM `huiswerk` INNER JOIN `student` ON huiswerk.KlasId = student.KlasId INNER JOIN `vak` ON Huiswerk.HuiswerkId = vak.VakId WHERE student.StudentId = :studentId ORDER BY huiswerk.HuiswerkDatum ASC");

            //Koppel parameter
            $statement->bindValue(":studentId", $studentId, PDO::PARAM_STR);

            //Voer statement uit
            $statement->execute();

            //Zorg dat data als associative array in $rows komt te staan
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            //Geef rows terug
            return $rows;
            }
        catch (PDOException $e) {
            return false;
        }
    }
}
?>