<?php
/*
vue gérant l'affichage de la page "Accueil utilisateur"
*/

$titre = 'Information utilisateur';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = my_information();

$footer = footer();

include('gabarit.php');
?>
