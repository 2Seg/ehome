<?php
/*
vue gérant l'affichage de la page "Nous rejoindre (page 1/2)"
*/
$titre = 'Nous rejoindre';

$menu = menu($_SESSION['type']);

$contenu = form_subscribe_user();

$footer = footer();

include('gabarit.php');
?>
