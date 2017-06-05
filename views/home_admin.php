<?php
/*
vue gérant l'affichage de la page "Accueil utilisateur"
*/

$titre = 'Accueil administrateur de '.$_SESSION['identifiant'];

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = my_basic_info($general_info_admin);
$contenu .= content_home_admin();

$footer = footer();

include('gabarit.php');
?>
