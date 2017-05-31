<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "home_user.php"
*/

include_once('modeles/functions.php');

if(isset($_GET['cible']) && $_GET['cible'] == 'room_add') {
  for($i = 0; $i < count($_POST['piece']); $i++) {
    insert_room($bdd, $_SESSION['id'], $_POST['piece'][$i]);
  }
  include('controlers/home_management.php');
} else {
  include('controlers/home_management.php');
}
