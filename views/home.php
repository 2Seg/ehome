<?php
/*
vue gérant l'affichage de la page "Accueil"
*/

$titre = 'Accueil';

$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}

$contenu = 'Voici la page "Accueil"';

$footer = footer();

include('gabarit.php');
?>
