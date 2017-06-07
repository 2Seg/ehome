<?php
/*
vue gérant l'affichage de la page "Gestion d'utilisateur" pour l'administrateur
*/
$titre = 'Gestion des utilisateurs';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

// $list_users = array(array("Monsieur","de Séguier", "Eliott"),
//                     array("Monsieur", "Robic", "Alan"),
//                     array("Madame", "Saad Marzouk", "Myriam"));
//
// // $list_users = array();

// print_r($list_users);

$contenu = list_users($list_users);

$footer = footer();

include('gabarit.php');
?>
