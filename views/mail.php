<?php
/*
vue gérant l'affichage des mails
*/

$titre = '';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = ;

$footer = footer();

include('gabarit.php');
