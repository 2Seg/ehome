<?php
/*
vue gérant l'affichage de la page "Nous rejoindre (page 2/2)"
*/
$titre = 'Choix pièces/capteurs';

$menu = menu($_SESSION['type']);

$contenu = '<h2>Choix des pièces et de leurs capteurs :</h2>';
$contenu .= form_capteur_piece($_POST['nb_piece']);

include('gabarit.php');
?>
