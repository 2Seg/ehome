<?php
/*
vue gérant l'affichage de la page "Nous rejoindre (page 2/2)"
*/
$titre = 'Nous rejoindre (2/2)';

$menu = menu($_SESSION['type']);

$contenu = '<h2>Page 2/2</h2>';
$contenu .= form_capteur_piece($_POST['nb_piece']);

include('gabarit.php');
?>
