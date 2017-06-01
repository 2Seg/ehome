<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "home_management.php"
*/

include_once('modeles/functions.php');

$info_home = select_info_home($bdd, $_SESSION['id']);
$nb_piece = count_piece($bdd, $_SESSION['id']);
$my_home = array();

if($info_home['nb_piece'] == 0) {
  include('views/home_management.php');
} else {
  $data_room = select_info_room($bdd, $_SESSION['id']);
  $i = 0;
  while($info_room = $data_room -> fetch()) {
    $my_home[$i][0] = $info_room['id'];
    $my_home[$i][1] = $info_room['piece'];
    $i++;
    $data_device = select_info_device($bdd, $info_room['id']);
    if($data_device -> rowcount() == 0) {
      $my_home[$i] = array();
    } else {
      $j = 0;
      while($info_device = $data_device -> fetch()) {
        $my_home[$i][$j] = $info_device['nb'];
        $j++;
        $my_home[$i][$j] = $info_device['type'];
        $j++;
      }
    }
    $i++;
  }
  include('views/home_management.php');
}
