<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "device_management.php"
*/

include_once('modeles/functions.php');

if(isset($_GET['id_piece'])) {
  $my_room = array(array($_GET['id_piece'], select_room_name($bdd, $_GET['id_piece'])));

  $info_device = select_device($bdd, $_GET['id_piece']);

  if ($info_device -> rowCount() != 0) {
    $i = 1;
    while($data_device = $info_device -> fetch()) {
      $my_room[$i] = array($data_device['id'], $data_device['type_dispositif'], $data_device['etat']);
      $i++;
    }
  }

  include('views/device_management.php');
} else {
  $erreur = "la pièce sélectionnée n'existe pas ou plus";
  include('views/error.php');
}
