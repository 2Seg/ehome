<?php

$host = 'localhost';
$bdd = 'ehome';
$user = 'root';
$pass = '';


try {
  $bdd = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", "$user", "$pass", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
  die('Erreur : ' . $e -> getMessage());
}
