<?php
/*
modèle répertoriant toutes les fonctions accédant à la bdd
*/

require("db_access.php");

/*****************************************************************SELECT***********************************************************************/

// fonction récupérant l'id et le mot de passe d'un utilisateur en fonction du login passé en entrée
function user_in_db($db, $login) {
  $req = $db -> prepare('SELECT id, identifiant,mot_de_passe FROM utilisateur WHERE identifiant = ?');
  $req -> execute(array($login));
  return $req;
}

// fonction récupérant l'id et le mot de passe d'un administrateur s'il est présent dans la bdd
function admin_in_db($db, $admin) {
  $req = $db -> prepare('SELECT id, identifiant, mot_de_passe FROM administrateur WHERE identifiant = ?');
  $req -> execute(array($admin));
  return $req;
}

// fonction qui renvoie un booléen en fontion de la présence d'un user dans la bdd
function user_existe_deja($db, $login) {
  $req = $db -> prepare('SELECT identifiant FROM utilisateur WHERE identifiant = ?');
  $req -> execute(array($login));

  if ($req -> rowcount() == 0) {
    return false;
  } else {
    return true;
  }
}

function presence_admin($db, $admin) {
  $req = $db -> prepare('SELECT identifiant FROM administrateur WHERE identifiant = ?');
  $req -> execute(array($admin));

  if ($req -> rowcount() == 0) {
    return false;
  } else {
    return true;
  }
}

// fonction qui sélectionne l'id d'un utilisateur
function select_id_user($db, $login) {
  $req = $db -> prepare('SELECT id FROM utilisateur WHERE identifiant = ?');
  $req -> execute(array($login));
  $data = $req -> fetch();
  return $data['id'];
}

// fonction qui sélectionne l'id d'un logement
// en entrée, c'est l'adresse du logement qui permet de récupérer le bonne id ($_POST['adresse_logement'])
function select_id_house($db, $adresse) {
  $req = $db -> prepare('SELECT id_user FROM logement WHERE adresse = ?');
  $req -> execute(array($adresse));
  return $req;
}

// function récupérant l'adresse du logement et le nombre de pièces d'un utilisateur (en fonction de son id)
function select_adress_room($db, $id_user) {
  $req = $db -> prepare('SELECT adresse, nb_piece FROM logement INNER JOIN utilisateur ON logement.id_user = utilisateur');
  $req -> execute(array($adresse));
}

// fonction récupérant les informations générales de l'utilisateur pour affichage sur la page d'accueil utilisateur
function select_general_info_user($db, $id) {
  $info = array();
  $req = $db -> prepare('SELECT utilisateur.id, utilisateur.civilite, utilisateur.nom, utilisateur.prenom,
                        utilisateur.identifiant, utilisateur.mot_de_passe, logement.adresse, logement.code_postal,
                        logement.ville, logement.pays
                        FROM utilisateur INNER JOIN logement ON utilisateur.id = logement.id_user
                        WHERE utilisateur.id = ?');
  $req -> execute(array($id));
  while($data = $req -> fetch()) {
    $info = $data;
  }
  return $info;
}

// fonction récupérant les informations générales de l'utilisateur pour affichage sur la page d'accueil administrateur
function select_general_info_admin($db, $id) {
  $info = array();
  $req = $db -> prepare('SELECT id, civilite, nom, prenom, pays, identifiant, mot_de_passe FROM administrateur WHERE id = ?');
  $req -> execute(array($id));
  while($data = $req -> fetch()) {
    $info = $data;
  }
  return $info;
}

// fonction récupérant les informations du domicile l'utilisateur pour affichage sur la page "Gestion du domicile"
function select_info_home($db, $id) {
  $info = array();
  $req = $db -> prepare('SELECT utilisateur.id, logement.adresse, logement.code_postal, logement.ville, logement.pays,
                        logement.nb_habitant, logement.nb_piece, logement.superficie
                        FROM utilisateur INNER JOIN logement ON utilisateur.id = logement.id_user
                        WHERE utilisateur.id = ?');
  $req -> execute(array($id));
  while($data = $req -> fetch()) {
    $info = $data;
  }
  return $info;
}

// fonction récupérant les informations NON INTERPRETEES sur les pièces du logement
function select_info_room($db, $id_logement) {
  $info = array();
  $req = $db -> prepare('SELECT * FROM piece WHERE piece.id_logement = ? ORDER BY id');
  $req -> execute(array($id_logement));
  return $req;
}

function count_piece($db, $id_logement) {
  $info = array();
  $req = $db -> prepare('SELECT COUNT(piece) AS nb_piece FROM piece WHERE id_logement = ?');
  $req -> execute(array($id_logement));
  $data = $req -> fetch();
  return $data['nb_piece'];
}

function select_info_device($db, $id_piece) {
  $info = array();
  $req = $db -> prepare('SELECT COUNT(type_dispositif) AS nb, type_dispositif AS type FROM dispositif WHERE id_piece = ?
                        GROUP BY type_dispositif ORDER BY type');
  $req -> execute(array($id_piece));
  return $req;
}

/*****************************************************************INSERT***********************************************************************/

// fonction gérant l'inscription utilisateur en ajoutant les champs dans la bdd
// traite les informations personnelles de l'user
function insert_info_user($db, $id_admin, $civilite, $nom, $prenom, $identifiant, $mot_de_passe, $date_naissance, $nationalite, $pays,
                          $telephone, $mail, $info_paiement) {
  $req = $db -> prepare('INSERT INTO utilisateur(id_admin, civilite, nom, prenom, identifiant, mot_de_passe, date_naissance, nationalite,
                        pays, mail, telephone, info_paiement, date_connexion, date_inscription) VALUES(:id_admin, :civilite, :nom, :prenom,
                        :identifiant, :mot_de_passe, :date_naissance, :nationalite, :pays, :mail, :telephone, :info_paiement, NOW(),
                        CURDATE())');
  $req -> execute(array('id_admin' => $id_admin,
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
}

function insert_info_admin($db, $civilite, $nom, $prenom, $identifiant, $mot_de_passe, $date_naissance, $nationalite, $pays, $telephone,
                          $mail, $nb_user) {
  $req = $db -> prepare('INSERT INTO administrateur(civilite, nom, prenom, identifiant, mot_de_passe, date_naissance, nationalite,
                        pays, mail, telephone, nb_user)
                        VALUES(:civilite, :nom, :prenom, :identifiant, :mot_de_passe, :date_naissance, :nationalite, :pays, :mail,
                        :telephone, :nb_user)');
  $req -> execute(array('civilite' => $civilite,
                      'nom' => $nom,
                      'prenom' => $prenom,
                      'identifiant' => $identifiant,
                      'mot_de_passe' => $mot_de_passe,
                      'date_naissance' => $date_naissance,
                      'nationalite' => $nationalite,
                      'pays' => $pays,
                      'mail' => $mail,
                      'telephone' => $telephone,
                      'nb_user' => $nb_user));
}

// fonction gérant l'inscription utilisateur en ajoutant les champs dans la bdd
// traite les informations sur le logement de l'user
function insert_info_home($db, $id_user, $adresse, $code_postal, $ville, $pays, $nb_habitant, $nb_piece, $superficie) {
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
}

// fonction gérant l'écriture des données relatives aux choix des capteurs selon la pièce dans la $bdd
function insert_room($db, $id_logement, $piece) {
  $req = $db -> prepare('INSERT INTO piece(id_logement, piece) VALUES(:id_logement, :piece)');
  $req -> execute(array('id_logement' => $id_logement, 'piece' => $piece));
}

/*****************************************************************UPDATE***********************************************************************/

// function qui met à jour les dispositifs présent dans les différentes pièces
function update_sensor_room($db, $id_logement, $id_piece, $piece, $capteur_luminosite, $capteur_temperature, $capteur_humidite,
                          $detecteur_mouvement, $detecteur_fumee, $camera, $actionneur) {
  $req = $db -> prepare('UPDATE piece SET piece = :piece,
                        capteur_luminosite = :capteur_luminosite, capteur_temperature = :capteur_temperature,
                        capteur_humidite = :capteur_humidite, detecteur_mouvement = :detecteur_mouvement,
                        detecteur_fumee = :detecteur_fumee, camera = :camera, actionneur = :actionneur
                        WHERE id_logement = :id_logement AND id_piece = :id_piece');
  $req -> execute(array('id_logement' => $id_logement,
                        'id_piece' => $id_piece,
                        'piece' => $piece,
                        'capteur_luminosite' => $capteur_luminosite,
                        'capteur_temperature' => $capteur_temperature,
                        'capteur_humidite' => $capteur_humidite,
                        'detecteur_mouvement' => $detecteur_mouvement,
                        'detecteur_fumee' => $detecteur_fumee,
                        'camera' => $camera,
                        'actionneur' => $actionneur));
}

// fonction modifiant le nb de piece d'un logement
function update_nb_piece($db, $id_logement, $nb_piece) {
  $req = $db -> prepare('UPDATE logement SET nb_piece = :nb_piece WHERE id_user = :id_logement');
  $req -> execute(array('id_logement' => $id_logement, 'nb_piece' => $nb_piece));
}

/*****************************************************************DELETE***********************************************************************/

// function qui supprime une pièce d'un logement ainsi que tous les capteurs associés
function delete_room($db, $id_logement, $id_piece) {
  $req = $db -> prepare('DELETE FROM piece WHERE id_logement = :id_logement AND id = :id_piece');
  $req -> execute(array('id_logement' => $id_logement, 'id_piece' => $id_piece));
  $req -> closeCursor();
  $req = $db -> prepare('DELETE FROM dispositif WHERE id_piece = ?');
  $req -> execute(array($id_piece));
}
