<?php
/*
vue gérant l'affichage de la page "Nous rejoindre (page 2/2)"
*/
$titre = 'Confirmation de l\'inscription';

$menu = menu($_SESSION['type']);

$contenu = '<h2>Vous êtes dorénavant inscrit.</h2>';
$contenu .= '<p>Veuillez vous connecter pour continuer.</p>';

$footer = footer();
include('gabarit.php');
?>
