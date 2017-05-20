<?php
/*
vue gérant l'affichage de la page de choix des capteurs en fonction des pièces
*/
$titre = 'Choix pièces/capteurs';

$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}

$contenu = '<h2>Choix des pièces et de leurs capteurs :</h2>';

$contenu .= form_capteur_piece();

$footer = footer();

include('gabarit.php');
?>
