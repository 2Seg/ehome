<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "home_user.php"
*/

include_once('modeles/functions.php');

$general_info_user = select_general_info_user($bdd, $_SESSION['id']);

include('views/home_user.php');
