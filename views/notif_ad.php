<?php
/*
vue gérant l'affichage de la page "Notifications"
*/

$titre = 'Notifications';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = ' ';

$footer = footer();

include('gabarit.php');
?>
