<?php
/*
vue demandant à l'user quel type de personne il est (utilisateur ou admin)
*/

$titre = 'Nous rejoindre';

$menu = menu();

$contenu = type_user();

$footer = footer();

include('gabarit.php');
?>
