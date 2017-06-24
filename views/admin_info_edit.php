<?php
/*
vue gérant l'affichage de la page des modification des inforamtions utilisateur
*/

$titre = "Modifier mes informations administrateur";

$menu = menu();
$menu .= menu_user($_SESSION['type']);

// $my_full_info = array(array("Monsieur", "de Séguier", "Eliott", "20/06/1995", "Française", "France", "eliottdes@gmail.com", "0663670680"),
//                       array("69 rue Balard", "75015", "Paris", "France", 8, 98, 6),
//                       array("Prélévement automatique mensuel"),
//                       array("eliottdes"));
//print_r($my_full_info);

if (isset($erreur)) {
  $contenu = '<h2 class="except_h2" id="error_h2">Erreur : '.$erreur.'</h2>';
  $contenu .= form_full_info_admin($my_full_info_admin);
} else {
  $contenu = form_full_info_admin($my_full_info_admin);
}

$footer = footer();

include('gabarit.php');
