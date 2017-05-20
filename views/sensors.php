<?php
/*
Page Capteurs de Nos Produits
*/
$titre = 'Nos capteurs';


$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}

$menu .= menu_products();

// début du contenu...
$contenu = content_sensors();

$footer = footer();
include('gabarit.php');

?>
