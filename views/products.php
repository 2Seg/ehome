<?php
/*
vue gérant l'affichage de la page "Nos produits"
*/
$titre = 'Nos produits';

$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}
$menu .= menu2();
//$menu_products = menu_products('');

// début du contenu...
$contenu = 'Voici la page principale "Produits"';
// fin du contenu

$footer = footer('');
include('gabarit.php');

?>
