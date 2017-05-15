<?php
/*
fichier principal dirigeant l'utilisateur vers différentes pages en fonction de ses choix
*/

session_start();
require("views/commun.php");
require("modeles/db_access.php");

if(isset($_GET['cible'])) {
  if ($_GET['cible'] == 'home') {
    include 'views/home.php';
  } elseif ($_GET['cible'] == 'about-us') {
    include('views/about-us.php');
  } elseif ($_GET['cible'] == 'products') {
    include('views/products.php');
  } elseif ($_GET['cible'] == 'join-us') {
    include('views/join-us.php');
  } elseif ($_GET['cible'] == 'signin') {
    include("views/signin.php");
  } elseif ($_GET['cible'] == 'connexion') {
    include('controlers/signin.php');
  } else {
    include ('views/home.php');
  }
} else {
  include ('views/home.php');
}
