<?php
function afficherHomePage()
{
    $connecte = false;
    if($connecte)
    require_once 'c:/xampp/htdocs/php/20_juin/UserSide/view/homepage/template_homepage_connected.php';
    //C:\xampp\htdocs\php\20_juin\UserSide\view\homepage\template_homepage_connected.php
    else
    require_once 'c:/xampp/htdocs/php/20_juin/UserSide/view/homepage/template_homepage_not_connected.php';
    //C:\xampp\htdocs\php\20_juin\UserSide\view\homepage\template_homepage_not_connected.php
}
?>