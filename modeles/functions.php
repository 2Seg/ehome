<?php
require("db_access.php");

// fonction vérifiant si l'user est présent dans la bdd, retourne true si c'est le cas et false sinon
function user_in_db($db, $user) {
  $data = $db -> prepare('SELECT id, mot_de_passe FROM utilisateur WHERE identifiant = ?');
  $data -> execute(array($user));
  return $data;
}
/*
function pass_verif($user, $pass) {
  $data = $db -> prepare('SELECT id FROM utilisateur WHERE identifiant = ?');
}*/

?>
