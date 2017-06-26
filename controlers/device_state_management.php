<?php
/*
controleur gérant la mise à jour des données modfiées sur la page "home_user.php"
*/

include_once('modeles/functions.php');

print_r($_POST);
foreach ($_POST as $element => $variable) {
  $part = explode("_", $element);
  $device = $part[0];
  $id_device = $part[1];

  if ($device == "checkbox") {
    update_state_checkbox($bdd, $id_device, $variable);
  } else {
   insert_state_device($bdd, $id_device, $variable);
  }
}

$message = "Les modifications ont bien été effectuées.";

include('controlers/home_user.php');
