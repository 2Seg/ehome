<?php
/*
vue gérant l'affichage de la page "Nous rejoindre "
*/
$titre = 'Nous rejoindre';

$menu = menu();

$contenu = form_subscribe_admin();

$footer = footer();

include('gabarit.php');
?>
