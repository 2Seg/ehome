<?php
/*
controleur gérant la suppression d'un utilisateur de la base de données
pour l'affichage de la page "user_suppression.php"
*/

include_once('modeles/functions.php'); // cela appelle toutes les fonctions contenues dans le dossier Modeles (fonctions.php)

delete_user($bdd, $_GET['id_sup']); // supprime le client en question

include('views/user_suppression.php'); // la page de VIEWS
