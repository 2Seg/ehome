<?php
/*
vue gérant l'affichage de la page "Nous rejoindre "
*/
$titre = 'Nous rejoindre';

$menu = menu();

$contenu = form_subscribe_user();

$footer = footer();

include('gabarit.php');
?>
