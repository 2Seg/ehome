<?php
/*
controleur gérant l'extraction des données néccessaires pour l'affichage de la page "home_user.php"
*/

$donnees = select_general_info_user($bdd, $_SESSION['id']);

$ligne = $donnees -> fetch();

$_SESSION['civilite'] = htmlspecialchars($ligne['civilite']);
$_SESSION['nom'] = htmlspecialchars($ligne['nom']);
$_SESSION['prenom'] = htmlspecialchars($ligne['prenom']);
$_SESSION['adresse'] = htmlspecialchars($ligne['adresse']);
$_SESSION['code_postal'] = htmlspecialchars($ligne['code_postal']);
$_SESSION['ville'] = htmlspecialchars($ligne['ville']);
$_SESSION['pays'] = htmlspecialchars($ligne['pays']);


include('views/home_user.php');
