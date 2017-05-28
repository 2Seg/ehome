<?php
/*
vue gérant l'affichage de la page "Accueil"
*/

$titre = 'Accueil';

$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}

$contenu = caroussel_home();
$contenu .= content_home();

$footer = footer_s();
$footer .= footer();


include('gabarit.php');
?>
