<?php
/*
vue gérant l'affichage de la page "Gestion d'utilisateur"
*/

$titre = 'Gestion des utilisateurs';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = ' ';

$footer = footer();

include('gabarit.php');
?>
