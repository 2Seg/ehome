<?php
/*
vue gérant l'affichage de la page "Nos produits"
*/
$titre = 'Nos produits';
$menu = menu($_SESSION['type']);

$contenu = menu_products('');
$footer = footer('');
include('gabarit.php');

?>
