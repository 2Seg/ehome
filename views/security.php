<?php
/*
vue gérant l'affichage de la page "Sécurité"
*/

$titre = 'Sécurité';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = content_security();

$footer = footer();

include('gabarit.php');
?>
