<?php
/*
vue gérant l'affichage de la page "Nous rejoindre"
*/
$titre = 'Nous rejoindre';

$menu = menu($_SESSION['type']);

$contenu = '<h2>Page 1/2</h2>';
$contenu .= form_subscribe('');
$footer = footer();

include('gabarit.php');
?>
