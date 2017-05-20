<?php
/*
vue gérant l'affichage de la page de choix des capteurs en fonction des pièces
*/

$titre = 'Choix pièces/capteurs';

$menu = menu();
$menu .= menu_user($_SESSION['type']);


$contenu = form_sensor_room();

$footer = footer();

include('gabarit.php');
?>
