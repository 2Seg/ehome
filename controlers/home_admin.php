<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "home_admin.php"
*/

$donnees2 = select_info_admin($bdd, $_SESSION['id']);

$ligne = $donnees2 -> fetch();

$_SESSION['civilite'] = htmlspecialchars($ligne['civilite']);
$_SESSION['nom'] = htmlspecialchars($ligne['nom']);
$_SESSION['prenom'] = htmlspecialchars($ligne['prenom']);
$_SESSION['identifiant'] = htmlspecialchars($ligne['identifiant']);
$_SESSION['date_naissance'] = htmlspecialchars($ligne['date_naissance']);
$_SESSION['nationalite'] = htmlspecialchars($ligne['nationalite']);
$_SESSION['pays'] = htmlspecialchars($ligne['pays']);
$_SESSION['mail'] = htmlspecialchars($ligne['mail']);
$_SESSION['telephone'] = htmlspecialchars($ligne['telephone']);

include('views/home_admin.php');
