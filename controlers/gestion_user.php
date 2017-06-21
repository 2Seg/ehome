<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "gestion_user.php" pour manager un seul client
*/

include_once('modeles/functions.php');

// $id = 'id';
$gestion_user = select_gestion_user($bdd, $_GET['id']);

// $info_admin = select_info_admin($bdd, $_SESSION['id']);

// $_SESSION['civilite'] = $info_admin['civilite'];

include('views/gestion_user.php');
