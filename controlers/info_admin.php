<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "info_admin.php"
*/

include_once('modeles/functions.php');

$info_admin = select_info_admin($bdd, $_SESSION['id']);

$_SESSION['civilite'] = $info_admin['civilite'];

include('views/info_admin.php');
