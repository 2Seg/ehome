<?php
/*
vue gérant l'affichage de la page Erreur", qui est la page affichée par défaut (si la page demandée n'existe pas par exemple)
*/
$titre = 'Erreur';

$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}

$contenu = '<h2>Erreur : il semblerait que la page demandée n\'existe pas.</h2>';

$footer = footer();
include('gabarit.php');
?>
