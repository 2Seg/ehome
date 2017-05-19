<?php
/*
vue gérant l'affichage de la page "Nos produits"
*/
$titre = 'Nos produits';

$menu = menu2($_SESSION['type']);
//$menu_products = menu_products('');

// début du contenu...
$contenu = 'Voici la page principale "Produits"';
// fin du contenu

$footer = footer('');
include('gabarit.php');

?>
