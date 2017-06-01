<?php
/*
vue gérant l'affichage de la page "Accueil"
*/

$titre = 'Accueil';



$menu = carroussel_home();
$menu .= menu_home();

if (isset($_SESSION['type']))
{
  $menu .= menu_user($_SESSION['type']);
}

// $contenu = carroussel_home();
$contenu = content_home();


$footer = footer_s();
$footer .= footer();


include('gabarit.php');
?>
