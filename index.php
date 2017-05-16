<?php
/*
fichier principal dirigeant l'utilisateur vers différentes pages en fonction de ses choix
*/

session_start();
require("views/commun.php");
require("modeles/db_access.php");

if(!isset($_SESSION['type'])){
  // on créé une (fausse) variable session pour que le menu s'affiche différemment quand l'user n'est pas connecté
  $_SESSION['type'] = '';
}
if(isset($_GET['cible'])) {
  if ($_GET['cible'] == 'home') { // bonjour
    include 'views/home.php';
  } elseif ($_GET['cible'] == 'about-us') {
    include('views/about-us.php');
  } elseif ($_GET['cible'] == 'products') {
    include('views/products.php');
  } elseif ($_GET['cible'] == 'join-us') {
    include('views/join-us.php');
  } elseif ($_GET['cible'] == 'signin') {
    include("views/signin.php");
  } elseif ($_GET['cible'] == 'connect') {
    include('controlers/signin.php');
  } elseif ($_GET['cible'] == 'disconnect') {
    include('controlers/disconnect.php');
  } else {
    include ('views/home.php');
  }
} else {
  include ('views/home.php');
}
