<?php
/*
controleur gérant le choix ou la mise à jour des capteurs en fonction des pièces
*/







for($i = 1; $i <= $_ligne['nb_piece']; $i++) {
  sensor_choice($bdd, $ligne['id_user'], $_POST['piece_'.$i], $_POST['luminosite_'.$i], $_POST['temperature_'.$i], $_POST['humidite_'.$i], $_POST['mouvement_'.$i], $_POST['fumee_'.$i], $_POST['camera_'.$i], $_POST['actionneur_'.$i]);
}
