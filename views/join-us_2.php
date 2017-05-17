<?php
/*
vue gérant l'affichage de la page "Nous rejoindre"
*/
$titre = 'Nous rejoindre';

$menu = menu($_SESSION['type']);

$contenu = '<h2>Page 2/2</h2>';
$contenu .= form_capteur_piece();

include('gabarit.php');
?>
