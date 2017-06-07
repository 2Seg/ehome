<?php
/*
vue gérant l'affichage de la page "Gestion d'utilisateur" pour l'administrateur
*/
$titre = 'Gestion des utilisateurs';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = admin_listing($list_users);

$footer = footer();

include('gabarit.php');
?>
