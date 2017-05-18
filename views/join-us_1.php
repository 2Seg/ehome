<?php
/*
vue gérant l'affichage de la page "Nous rejoindre (page 1/2)"
*/
$titre = 'Nous rejoindre (1/2)';

$menu = menu($_SESSION['type']);

$contenu = '<h2>Page 1/2</h2>';
$contenu .= form_subscribe_user();

include('gabarit.php');
?>
