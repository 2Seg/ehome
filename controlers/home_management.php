<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "home_management.php"
*/

include('modeles/functions.php');

$info_home = select_info_home($bdd, $_SESSION['id']);

if($info_home['nb_piece'] == 0) {
  $data_room = false;
  $data_device = false;
  include('views/home_management.php');
} else {
  $data_room = select_info_room($bdd, $_SESSION['id']);

  if ($data_room -> rowcount() == 0) {
    $data_room = false;
    $data_device = false;
    include('views/home_management.php');
  } else {
    $data_device = select_info_device($bdd, $_SESSION['id']);
    $info_device = array();
    $i = 0;
    while($info = $data_device -> fetch()) {
      $info_device[$i] = $info;
      $i++;
    }
    include('views/home_management.php');
  }

}
