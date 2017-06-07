<?php
/*
vue gérant l'affichage de la page "Mes notifications"
*/

$titre = 'Mes notifications';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = 'notifications';

$footer = footer();

include('gabarit.php');
