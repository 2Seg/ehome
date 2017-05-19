<?php
/*
Page Capteurs de Nos Produits
*/
$titre = 'Nos capteurs';

$menu = menu($_SESSION['type']);
$menu .= menu_products();

// début du contenu...
$contenu = content_sensors();

$footer = footer();
include('gabarit.php');

?>
