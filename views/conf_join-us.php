<?php
/*
vue gérant l'affichage de la page "Nous rejoindre (page 2/2)"
*/
$titre = 'Confirmation de l\'inscription';

$menu = menu();

$contenu = '<section><artcile><h2>Vous êtes dorénavant inscrit</h2>';
$contenu .= '<p>Veuillez vous <a class="lien" href="index.php?cible=signin">connecter</a> pour continuer</p></article></section>';

$footer = footer();
include('gabarit.php');
?>
