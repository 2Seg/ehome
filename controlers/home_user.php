<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "home_user.php"
*/

include_once('modeles/functions.php');

$general_info_user = select_general_info_user($bdd, $_SESSION['id']);

$_SESSION['civilite'] = $general_info_user['civilite'];


$list_room_user = array();
$list_device_user = array();
$data_state = array();
$data_room = select_info_room($bdd, $_SESSION['id']);
$data_device = select_device_user($bdd, $_SESSION['id']);

if ($data_room -> rowcount() != 0) {
  $i = 0;
  while ($info_room = $data_room -> fetch()) {
    $list_room_user[$i] = addslashes($info_room['piece']).' '.$info_room['id'];
    $i++;
  }
}
if ($data_device -> rowcount() != 0) {
  $j = 0;
  while ($info_device = $data_device -> fetch()) {
    $list_device_user[$j] = addslashes($info_device['type_dispositif']);
    $j++;
  }
}

if (isset($_POST['options'])) {
  if ($_POST['type_affichage'] == "piece") {
    $part = explode(" ", $_POST['options'][0]);
    $room = $part[0];
    $id_room = $part[1];

  } elseif ($_POST['type_affichage'] == "dispositif") {
    $type_dispositif = $_POST['options'][0];

  }
}


include('views/home_user.php');
