<?php
/*
modèle répertoriant toutes les fonctions accédant à la bdd
*/

require("db_access.php");

// fonction récupérant l'id et le mot de passe d'un utilisateur s'il est présent dans la bdd
function user_in_db($db, $user) {
  $req = $db -> prepare('SELECT id, identifiant, mot_de_passe FROM utilisateur WHERE identifiant = ?');
  $req -> execute(array($user));
  return $req;
}
