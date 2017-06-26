<?php
/*
vue gérant l'affichage de la page "Notifications"
*/

$titre = 'Mes notifications administrateur';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = content_notif_admin();

$footer = footer();

include('gabarit.php');
?>
