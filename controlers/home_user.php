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

    $data_state[0] = "piece";
    $data_state[1] = array($id_room, $room);

    $data = select_device_user2($bdd, $_SESSION['id'], $id_room);

    if ($data -> rowcount() != 0) {
      $i = 2;
      while($info = $data -> fetch()) {
        $data_state[$i][0] = $info['id'];
        $data_state[$i][1] = $info['type_dispositif'];
        $data_state[$i][2] = $info['etat'];

        $data2 = select_mesure_choice($bdd, $_SESSION['id'], $info['id']);

        if($data -> rowcount() == 0) {
          $data_state[$i][3] = "";
          $data_state[$i][4] = "";
          $data_state[$i][5] = "";
        } else {
          $info2 = $data2 -> fetch();
          $data_state[$i][3] = $info2['mesure'];
          $data_state[$i][4] = $info2['date_format'];
        }
        $i++;
      }
    }

  } elseif ($_POST['type_affichage'] == "dispositif") {
    $type_dispositif = $_POST['options'][0];

    $data_state[0] = "dispositif";
    $data_state[1] = array("", "");

    $data = select_device_user3($bdd, $_SESSION['id'], $type_dispositif);

    if ($data -> rowcount() != 0) {
      $i = 2;
      while($info = $data -> fetch()) {
        $data_state[$i][0] = $info['id'];
        $data_state[$i][1] = $info['type_dispositif'];
        $data_state[$i][2] = $info['etat'];

        $data2 = select_mesure_choice($bdd, $_SESSION['id'], $info['id']);

        if($data -> rowcount() == 0) {
          $data_state[$i][3] = "";
          $data_state[$i][4] = "";
        } else {
          $info2 = $data2 -> fetch();
          $data_state[$i][3] = $info2['mesure'];
          $data_state[$i][4] = $info2['date_format'];
        }
        $data_state[$i][5] = $info['piece'].' (n°'.$info['id_piece'].')';

        $i++;
      }
    }
  }
  // print_r($data_state);
}


include('views/home_user.php');
