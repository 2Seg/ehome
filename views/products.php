<?php
/*
vue gérant l'affichage de la page "Nos produits"
*/
$titre = 'Nos produits';


$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}

$menu .= menu_products('');

$contenu = content_products();


$footer = footer();
include('gabarit.php');

?>
