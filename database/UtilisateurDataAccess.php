<?php
require_once 'C:/xampp/htdocs/php/20_juin/UserSide/models/Utilisateur.php';

class UtilisateurDataAccess
{
    public static function create($pdo,$utilisateur)
    {
        $sql = "INSERT INTO utilisateur (`pseudo`, `email`, `motdepasse`)
        VALUES ('$utilisateur->pseudo', '$utilisateur->email', '$utilisateur->motdepasse')";
        echo "<br>UtilisateurDataAccess::create() - sql=$sql";
        try{
            $pdo->exec();
            return true;
        }
        catch(PDOException $exception)
        {
            return false;
        }
    }
}

?>