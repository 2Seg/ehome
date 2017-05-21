<?php

$titre = 'Mentions légales';

$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}

$contenu = content_legal_information();

$footer = footer();
include('gabarit.php');
?>
