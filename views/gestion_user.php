<?php
/*
vue gérant l'affichage de la page de gestion d'un utilisateur par l'administrateur
*/

$titre = 'Gestion de l\'utilisateur';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = content_gestion_user($gestion_user);

$footer = footer();

include('gabarit.php');
?>
