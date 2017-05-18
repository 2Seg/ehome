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

// fonction qui renvoie un booléen en fontion de la présence d'un user dans la bdd
function presence_user() {
  $req = $db -> prepare('SELECT identifiant FROM utilisateur WHERE identifiant = ?');
  $req -> execute(array($user));

  if ($req -> rowcount() == 0) {
    return false;
  } else {
    return true;
  }
}

// fonction incrémentant id_admin, id_logement et id_abonnement afin que les valeurs changent en fonction des utilisateurs
function prepare_id($db) {
  $req = $db -> query('SELECT MAX(id_admin) AS admin, MAX(id_logement) AS logement, MAX(id_abonnement) AS abonnement FROM utilisateur');
  return $req;
}

// fonction gérant l'inscription utilisateur en ajoutant les champs dans la bdd
// traite les informations personnelles de l'user
function subscribe_perso($db, $id_admin, $id_logement, $id_abonnement, $civilite, $nom, $prenom, $identifiant, $mot_de_passe, $date_naissance, $nationalite, $pays, $mail, $telephone, $info_paiement, $date_connexion, $date_inscription) {
  $req = $db -> prepare('INSERT INTO utilisateur(id_admin, id_logement, id_abonnement, civilite, nom, prenom, identifiant, mot_de_passe, date_naissance, nationalite, pays, mail, telephone, info_paiement, date_connexion, date_inscription)
                          VALUES(:id_admin, :id_logement, id_abonnement, :civilite, :nom, :prenom, :identifiant, :mot_de_passe, :date_naissance, :nationalite, :pays, :mail, :telephone, info_paiement, NOW(), CURDATE())');
  $req -> execute(array('id_admin' => $id_admin,
                      'id_logement' => $id_logement,
                      'id_abonnement' => $id_abonnement,
                      'civilite' => $civilite,
                      'nom' => $nom,
                      'prenom' => $prenom,
                      'identifiant' => $identifiant,
                      'mot_de_passe' => $mot_de_passe,
                      'date_naissance' => $date_naissance,
                      'nationalite' => $nationalite,
                      'pays' => $pays,
                      'mail' => $mail,
                      'telephone' => $telephone,
                      'info_paiement' => $info_paiement));
  return $req;
}

// fonction gérant l'inscription utilisateur en ajoutant les champs dans la bdd
// traite les informations sur le logement de l'user
function suscribe_house($db, $)
