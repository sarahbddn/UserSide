<?php
require_once'UtilisateurDataAccess.php';
require_once'imageDataAccess.php';
require_once'photoDataAccess.php';

function pdo_connect () {
    $host = 'localhost';
    $name = 'webImage';
    $user = 'root';
    $password = '';
    try
    {
        return PDO("mysql:host=$host:dbname=$name", $user, $password);
    }
    catch (PDOException $exception)
    {
        echo $exception->getMessage();
        die('CONNECTION ECHOUEE');
    }
}
?>