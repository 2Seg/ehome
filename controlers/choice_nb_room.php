<?php
/*
controleur gérant l'ajout des dispositifs des pièces
*/

include('modeles/functions.php');

for($i = $_SESSION['nb_piece'] + 1; $i <= $_SESSION['nb_piece'] + $_SESSION['nb_piece_ajout']; $i++) {
  insert_sensor_room($bdd, $_SESSION['id_logement'], $i, $_POST['piece_'.$i], $_POST['luminosite_'.$i], $_POST['temperature_'.$i],
                    $_POST['humidite_'.$i], $_POST['mouvement_'.$i], $_POST['fumee_'.$i], $_POST['camera_'.$i],
                    $_POST['actionneur_'.$i]);
}

$_SESSION['nb_piece'] = $_SESSION['nb_piece'] + $_SESSION['nb_piece_ajout'];
update_nb_piece($bdd, $_SESSION['id_logement'], $_SESSION['nb_piece']);

$message = 'L\'ajout des dispositifs dans la (les) pièce(s) a bien été effectué.';
include('views/conf_sensor.php');
