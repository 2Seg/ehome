<?php
/*
vue gérant l'affichage de la page de confirmation du choix des capteurs
Affiche un message différent en fonction de ce que l'user a fait (ajout d'une pièce, suppresion, mise à jour, ...)
*/
$titre = 'Confirmation du choix des capteurs';

$menu = menu();
$menu .= menu_user($_SESSION['type']);


$contenu = '<h2>'.$message.'</h2>';

$footer = footer();
include('gabarit.php');
?>
