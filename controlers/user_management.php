<?php
/*
controleur gérant l'extraction des données néccessaires (la liste des utilisateurs)
pour l'affichage de la page "user_management.php"
*/

include_once('modeles/functions.php'); // cela appelle toutes les fonctions contenues dans le dossier Modeles (fonctions.php)

$data_users = select_list_users($bdd); // supervariable qui va contenir la requête de la BDD

if ($data_users -> rowCount() == 0) {
  $list_users = array();
} else {
  $list_users = array();
  $i = 0;
  while ($info_users = $data_users -> fetch()) {
    $list_users[$i] = array($info_users['civilite'], $info_users['nom'], $info_users['prenom'], $info_users['id']);
    $i++;
  }
}

include('views/user_management.php'); // la page de VIEWS
