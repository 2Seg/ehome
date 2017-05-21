<?php
/*
vue gérant l'affichage de la page de suppression des capteurs en fonction des pièces
*/

$titre = 'Suppression pièces/capteurs';

$menu = menu();
$menu .= menu_user($_SESSION['type']);


$contenu = erase_sensor_room();

$footer = footer();

include('gabarit.php');
?>
