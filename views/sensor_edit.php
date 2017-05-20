<?php
/*
vue gérant l'affichage de la page de modification des capteurs en fonction des pièces
*/

$titre = 'Modification pièces/capteurs';

$menu = menu();
$menu .= menu_user($_SESSION['type']);


$contenu = form_capteur_piece();

$footer = footer();

include('gabarit.php');
?>
