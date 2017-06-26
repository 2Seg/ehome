<?php
/*
vue gérant l'affichage de la page de confirmation de la suppression d'un utilisateur
*/
$titre = 'Suppression utilisateur';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = content_user_suppression();

$footer = footer();

include('gabarit.php');
?>
