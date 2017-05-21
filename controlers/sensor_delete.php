<?php
/*
controleur gérant la suppression des données sur les dispositifs des pièces
*/

include('modeles/functions.php');

$n=0;
for($i = 1; $i <= $_SESSION['nb_piece']; $i++) {
  if(isset($_POST['piece_'.$i])) {
    delete_sensor_room($bdd, $_SESSION['id_logement'], $i);
    $n++;
  }
}


$_SESSION['nb_piece'] = $_SESSION['nb_piece'] - $n;
update_nb_piece($bdd, $_SESSION['id_logement'], $_SESSION['nb_piece']);

$message = 'La suppresion de la (les) pièce(s) a bien été effectuée.';
include('views/conf_sensor.php');
