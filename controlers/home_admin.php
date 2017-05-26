<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "home_admin.php"
*/

include_once('modeles/functions.php');

$general_info_admin = select_general_info_admin($bdd, $_SESSION['id']);

$_SESSION['civilite'] = $general_info_admin['civilite'];

include('views/home_admin.php');
