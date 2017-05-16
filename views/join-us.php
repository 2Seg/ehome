<?php
/*
vue gérant l'affichage de la page "Nous rejoindre"
*/
$titre = 'Nous rejoindre';

$menu = menu($_SESSION['type']);

$contenu = form_subscribe('');

include('gabarit.php');
?>
