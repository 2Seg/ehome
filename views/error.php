<?php
/*
vue gérant l'affichage de la page Erreur", qui est la page affichée par défaut (si la page demandée n'existe pas par exemple)
*/
$titre = 'Erreur';

$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}

if (isset($erreur)) {
  $contenu = '<section class="error"><h2 class="except_h2">Erreur : '.$erreur.'</h2>';
  $contenu .= '<p><a href="index.php?cible=home_management">Retour à la page précédente</a></p></section>';
} else {
  $contenu = '<section class="error"><h2 class="except_h2">Erreur : il semblerait que la page demandée n\'existe pas</h2></section>';
}

$footer = footer();
include('gabarit.php');
?>
