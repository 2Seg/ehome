<?php
/*
controleur gérant l'extraction des données néccessaires (la liste des utilisateurs)
pour l'affichage de la page "user_management.php"
*/

include_once('modeles/functions.php'); // cela appelle toutes les fonctions contenues dans le dossier Modeles (fonctions.php)
// dont select_list_users

// $bdd = 'ehome';
$list_users = select_list_users($bdd); // supervariable qui va contenir la requête de la BDD
include('views/user_management.php'); // la page de VIEWS
}
