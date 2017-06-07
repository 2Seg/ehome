<?php
/*
controleur gérant l'insertion des données relatives à l'ajout de capteurs
*/

include_once('modeles/functions.php');

if(isset($_GET['cible']) && $_GET['cible'] == 'device_add' && isset($_POST['dispositif']) && isset($_GET['id_piece'])) {
  for($i = 0; $i < count($_POST['dispositif']); $i++) {
    insert_device($bdd, $_GET['id_piece'], $_POST['dispositif'][$i]);
  }
  if (count($_POST['dispositif']) == 1) {
    $message = 'La dispositif \''.$_POST['dispositif'][0].'\' a bien été ajoutée';
  } else {
    $message = 'Les dispositifs ';
    for($i = 0; $i < count($_POST['dispositif'])-1; $i++) {
        $message .= '\''.$_POST['dispositif'][$i];
        if($i != count($_POST['dispositif']) - 2) {
          $message .= '\', ';
        } else {
          $message .= '\' ';
        }
    }
    $message .= 'et \''.$_POST['dispositif'][count($_POST['dispositif'])-1].'\' ';
    $message .= 'ont bien été ajoutés.';
  }
  include('controlers/device_management.php');
} else {
  include('controlers/device_management.php');
}
