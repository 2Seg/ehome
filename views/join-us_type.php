<?php
/*
vue demandant à l'user quel type de personne il est (utilisateur ou admin)
*/

$titre = 'Nous rejoindre';

$menu = menu();

$contenu = content_type_user();

$footer = footer2();

include('gabarit.php');
?>
