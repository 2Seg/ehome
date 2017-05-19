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
function presence_user($db, $user) {
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
function subscribe_perso($db, $id_admin, $id_logement, $id_abonnement, $civilite, $nom, $prenom, $identifiant, $mot_de_passe, $date_naissance, $nationalite, $pays, $telephone, $mail, $info_paiement) {
  $req = $db -> prepare('INSERT INTO utilisateur(id_admin, id_logement, id_abonnement, civilite, nom, prenom, identifiant, mot_de_passe, date_naissance, nationalite, pays, mail, telephone, info_paiement, date_connexion, date_inscription) VALUES(:id_admin, :id_logement, :id_abonnement, :civilite, :nom, :prenom, :identifiant, :mot_de_passe, :date_naissance, :nationalite, :pays, :mail, :telephone, :info_paiement, NOW(), CURDATE())');
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

// fonction qui sélectionne l'id d'un utilisateur
function select_id_user($db, $user) {
  $req = $db -> prepare('SELECT id FROM utilisateur WHERE identifiant = ?');
  $req -> execute(array($user));
  return $req;
}


// fonction gérant l'inscription utilisateur en ajoutant les champs dans la bdd
// traite les informations sur le logement de l'user
function subscribe_house($db, $id_user, $adresse, $code_postal, $ville, $pays, $nb_habitant, $nb_piece, $superficie) {
  $req = $db -> prepare('INSERT INTO logement(id_user, adresse, code_postal, ville, pays, nb_habitant, nb_piece, superficie)
                        VALUES(:id_user, :adresse, :code_postal, :ville, :pays, :nb_habitant, :nb_piece, :superficie)');
  $req -> execute(array('id_user' => $id_user,
                      'adresse' => $adresse,
                      'code_postal' => $code_postal,
                      'ville' => $ville,
                      'pays' => $pays,
                      'nb_habitant' => $nb_habitant,
                      'nb_piece' => $nb_piece,
                      'superficie' => $superficie));
  return $req;
}

// fonction qui sélectionne l'id d'un logement
// en entrée, c'est l'adresse du logement qui permet de récupérer le bonne id ($_POST['adresse_logement'])
function select_id_house($db, $adresse) {
  $req = $db -> prepare('SELECT id_user FROM logement WHERE adresse = ?');
  $req -> execute(array($adresse));
  return $req;
}

// fonction gérant l'écriture des données relatives aux choix des capteurs selon la pièce dans la $bdd
function sensor_choice($db, $id_logement, $piece, $capteur_luminosite, $capteur_temperature, $capteur_humidite, $detecteur_mouvement, $detecteur_fumee, $camera, $actionneur) {
  $req = $db -> prepare('INSERT INTO piece(id_logement, piece, capteur_luminosite, capteur_temperature, capteur_humidite, detecteur_mouvement, detecteur_fumee, camera, actionneur)
                        VALUES(:id_logement, :piece, :capteur_luminosite, :capteur_temperature, :capteur_humidite, :detecteur_mouvement, :detecteur_fumee, :camera, :actionneur)');
  $req -> execute(array('id_logement' => $id_logement,
                        'piece' => $piece,
                        'capteur_luminosite' => $capteur_luminosite,
                        'capteur_temperature' => $capteur_temperature,
                        'capteur_humidite' => $capteur_humidite,
                        'detecteur_mouvement' => $detecteur_mouvement,
                        'detecteur_fumee' => $detecteur_fumee,
                        'camera' => $camera,
                        'actionneur' => $actionneur));
  return $req;
}

// function récupérant l'adresse du logement et le nombre de pièces d'un utilisateur (en fonction de son id)
function select_adress_room($db, $id_user) {
  $req = $db -> prepare('SELECT adresse, nb_piece FROM logement INNER JOIN utilisateur ON logement.id_user = utilisateur');
  $req -> execute(array($adresse));
}
