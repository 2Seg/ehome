<?php
/*
vue gérant l'affichage de la page "Nos produits"
*/
$titre = 'Nos produits';

$menu = menu($_SESSION['type']);
$menu .= menu_products('');

// début du contenu...
$contenu = content_products('');
// fin du contenu

$footer = footer('');
include('gabarit.php');

?>
