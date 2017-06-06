<?php
/*
vue gérant l'affichage de la page "Messagerie"
*/

$titre = 'Messagerie';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = ' ';

$footer = footer();

include('gabarit.php');
?>
