<?php
/*
vue gérant l'affichage de la page "Accueil"
*/

$titre = 'Accueil';


$menu = carroussel_home();
$menu .= menu_home();

$contenu = content_p();
$contenu .= content_home();
$contenu .= content_c();

$footer = footer_s();
$footer .= footer();


include('gabarit.php');
?>
