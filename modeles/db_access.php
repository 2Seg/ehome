<?php
/*
modele permettant l'accès à la bdd
*/

$host = 'localhost';
$bdd = 'ehome';
$user = 'root';
$pass = 'root';


try {
  $bdd = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", "$user", "$pass", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
  die('Erreur : ' . $e -> getMessage());
}
