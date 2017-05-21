<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "home_management.php"
*/

include('modeles/functions.php');


// on récupère les données du logement
$data_home = select_info_home($bdd, $_SESSION['id']);
$line_home = $data_home -> fetch();

$_SESSION['id_logement'] = $line_home['id'];
$_SESSION['adresse'] = htmlspecialchars($line_home['adresse']);
$_SESSION['code_postal'] = htmlspecialchars($line_home['code_postal']);
$_SESSION['ville'] = htmlspecialchars($line_home['ville']);
$_SESSION['pays'] = htmlspecialchars($line_home['pays']);
$_SESSION['nb_habitant'] = htmlspecialchars($line_home['nb_habitant']);
$_SESSION['nb_piece'] = htmlspecialchars($line_home['nb_piece']);
$_SESSION['superficie'] = htmlspecialchars($line_home['superficie']);
// on test si les $donnees des pièces du logement existent
$test = test_data_room($bdd, $_SESSION['id_logement']);

if ($test -> rowcount() == 0) {
  // l'user n'a pas rempli le formulaire form_sensor_room
  $_SESSION['data_room'] = 'false';
  include('views/home_management.php');
} else {
  // on peut récupérer les données des pièces
  $_SESSION['data_room'] = 'true';

  // on déclare les variables sessions suivant le nombre de pièces, ie cela ne récupère que les données existantes
  for($i = 1; $i <= $_SESSION['nb_piece']; $i++) {
    $data_room = select_info_room($bdd, $_SESSION['id_logement'], $i);
    $line_room = $data_room -> fetch();
    $_SESSION['piece_'.$i] = $line_room['piece'];
    $_SESSION['luminosite_'.$i] = $line_room['capteur_temperature'];
    $_SESSION['temperature_'.$i] = $line_room['capteur_temperature'];
    $_SESSION['humidite_'.$i] = $line_room['capteur_humidite'];
    $_SESSION['mouvement_'.$i] = $line_room['detecteur_mouvement'];
    $_SESSION['fumee_'.$i] = $line_room['detecteur_fumee'];
    $_SESSION['camera_'.$i] = $line_room['camera'];
    $_SESSION['actionneur_'.$i] = $line_room['actionneur'];
  }
  include('views/home_management.php');
}
