<?php
/*
vue gérant l'affichage de la page "Gestion du domicile"
*/
$titre = 'Gestion du domicile';

$menu = menu();
$menu .= menu_user($_SESSION['type']);


$contenu = my_home_information();
$contenu .= my_sensor_room();



$footer = footer();

include('gabarit.php');
?>
