<?php
/*
controleur gérant l'insertion des données relatives à l'ajout de pièces
*/

include_once('modeles/functions.php');

if(isset($_GET['cible']) && $_GET['cible'] == 'room_add' && isset($_POST['piece'])) {
  for($i = 0; $i < count($_POST['piece']); $i++) {
    insert_room($bdd, $_SESSION['id'], maj_lettre1($_POST['piece'][$i]));
  }
  if (count($_POST['piece']) == 1) {
    $message = 'La pièce \''.maj_lettre1($_POST['piece'][0]).'\' a bien été ajoutée';
    update_nb_piece($bdd, $_SESSION['id'], count_piece($bdd, $_SESSION['id']));
  } else {
    $message = 'Les pieces ';
    for($i = 0; $i < count($_POST['piece'])-1; $i++) {
        $message .= '\''.maj_lettre1($_POST['piece'][$i]);
        if($i != count($_POST['piece']) - 2) {
          $message .= '\', ';
        } else {
          $message .= '\' ';
        }
    }
    $message .= 'et \''.maj_lettre1($_POST['piece'][count($_POST['piece'])-1]).'\' ';
    $message .= 'ont bien été ajoutées.';
    update_nb_piece($bdd, $_SESSION['id'], count_piece($bdd, $_SESSION['id']));
  }
  include('controlers/home_management.php');
} else {
  include('controlers/home_management.php');
}
