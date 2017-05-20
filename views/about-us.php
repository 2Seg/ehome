<?php

$titre = 'Notre entreprise';

$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}


$contenu = content_abouts_us();

$footer = footer();
include('gabarit.php');
?>
