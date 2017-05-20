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

$contenu = content_actuators();

$footer = footer();
include('gabarit.php');

?>
