<?php
require_once 'C:\xampp\htdocs\php\20_juin\UserSide\controllers\controllers.php';

if ((!isset($_REQUEST['command']))
    ||
    ($_REQUEST['command']=='homepage'))
    {
        afficherHomePage();
    }
    else
    {
        if (($_REQUEST['command']=='login')
        &&
        (UtilisateurDataAccess->checkPassword($_POST['email'], $_POST['motdepasse'])))
        {
            $_SESSION['connected']=true;
            afficherHomePage();
        }
    }
  ?>