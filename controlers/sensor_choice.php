<?php
/*
controleur gérant le choix ou la mise à jour des capteurs en fonction des pièces
*/

// On vérifie que l'utilisateur a été bien dirigé
if(isset($_GET['cible']) && $_GET['cible'] == 'sensor_choice') {
    include ('modeles/functions.php');

    // Cas où l'utilisateur est connecté et veut ajouter/supprimer/mettre à jour un(e) pièce/capteur
    if(isset($_SESSION['id'])) {

    }

    // Cas où l'utilisateur n'est pas connecté, ie il vient de valider le formulaire d'inscription join-us_1
    else {
      $donnees1 = select_id_house($bdd, $_ligne1['id']);
      $ligne1 = $donnees1 -> fetch();

      // on écrit les données sur le choix des capteurs en fonction des pièces dans la bdd
      for($i = 1; $i <= $_ligne1['nb_piece']; $i++) {
        sensor_choice($bdd, $ligne1['id_user'], $_POST['piece_'.$i], $_POST['luminosite_'.$i], $_POST['temperature_'.$i], $_POST['humidite_'.$i], $_POST['mouvement_'.$i], $_POST['fumee_'.$i], $_POST['camera_'.$i], $_POST['actionneur_'.$i]);
      }
      session_destroy();
      $message = 'Les choix effectués ont bien été pris en compte.';
      include('views/conf_sensor_choice.php');
    }

} /*else {
  include('views/join-us_1.php');
}*/
