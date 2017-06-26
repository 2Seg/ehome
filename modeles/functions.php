<?php
/*
modèle répertoriant toutes les fonctions accédant à la bdd
*/

require("db_access.php");

/*****************************************************************SELECT***********************************************************************/

// fonction récupérant l'id et le mot de passe d'un utilisateur en fonction du login passé en entrée
function user_in_db($db, $login) {
  $req = $db -> prepare('SELECT id, identifiant, mot_de_passe, mail FROM utilisateur WHERE identifiant = ?');
  $req -> execute(array($login));
  return $req;
}

function select_mail_user($db, $id) {
  $req = $db -> prepare('SELECT mail FROM utilisateur WHERE id = ?');
  $req -> execute(array($id));
  if ($req -> rowcount() == 0) {
    return false;
  } else {
    $info = $req -> fetch();
    return $info['mail'];
  }
}

function select_mail_admin($db, $id) {
  $req = $db -> prepare('SELECT mail FROM administrateur WHERE id = ?');
  $req -> execute(array($id));
  if ($req -> rowcount() == 0) {
    return false;
  } else {
    $info = $req -> fetch();
    return $info['mail'];
  }
}

function select_password_user($db, $id) {
  $req = $db -> prepare('SELECT mot_de_passe FROM utilisateur WHERE id = ?');
  $req -> execute(array($id));
  $info = $req -> fetch();
  return $info['mot_de_passe'];
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


// fonction récupérant ltoutes les informations de l'administrateur pour affichage sur la page d'info administrateur (info_admin)
function select_info_admin($db, $id) {
  $info = array();
  $req = $db -> prepare('SELECT * FROM administrateur WHERE id = ?');
  $req -> execute(array($id));
  while($data = $req -> fetch()) {
    $info = $data;
  }
  return $info;
}

// fonction récupérant les informations complètes de l'utilisateur pour affichage sur la page "Mes informations"
function select_full_info_user($db, $id) {
  $req = $db -> prepare("SELECT *, DATE_FORMAT(date_naissance, '%d/%m/%Y') AS date_naissance_format, utilisateur.pays AS pays_utilisateur,
                        logement.pays AS pays_logement FROM utilisateur INNER JOIN logement ON logement.id_user = utilisateur.id
                        WHERE utilisateur.id = ?");
  $req -> execute(array($id));
  $data = $req -> fetch();
  return $data;
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

// fonction récupérant la liste des utilisateurs pour la page user_management de Views
// cette fonction est utilisée dans la page user_management de Controles
function select_list_users($db) {
  $req = $db -> query('SELECT id, civilite, nom, prenom FROM utilisateur'); // contient toutes les réponses non rangées
  return $req; // $info est un tableau avec plusieurs valeurs dedans
}

// fonction récupérant les informations NON INTERPRETEES sur les pièces du logement
function select_info_room($db, $id_logement) {
  $info = array();
  $req = $db -> prepare('SELECT * FROM piece WHERE piece.id_logement = ? ORDER BY id');
  $req -> execute(array($id_logement));
  return $req;
}

function select_device_user($db, $id_logement) {
  $req = $db -> prepare('SELECT dispositif.type_dispositif FROM dispositif
                        INNER JOIN piece ON dispositif.id_piece = piece.id
												INNER JOIN logement ON piece.id_logement = logement.id
                        INNER JOIN utilisateur ON logement.id = utilisateur.id
                        WHERE utilisateur.id = ?
                        GROUP BY dispositif.type_dispositif');
  $req -> execute(array($id_logement));
  return $req;
}

function select_device_user2($db, $id, $id_room) {
  $req = $db -> prepare('SELECT dispositif.type_dispositif, dispositif.etat, dispositif.id FROM dispositif
                        INNER JOIN piece ON dispositif.id_piece = piece.id
												INNER JOIN logement ON piece.id_logement = logement.id
                        INNER JOIN utilisateur ON logement.id = utilisateur.id
                        WHERE utilisateur.id = :id AND dispositif.id_piece = :id_room');
  $req -> execute(array('id' => $id, 'id_room' => $id_room));
  return $req;
}

function select_device_user3($db, $id, $type_dispositif) {
  $req = $db -> prepare('SELECT dispositif.type_dispositif, dispositif.etat, dispositif.id, piece.piece, piece.id AS id_piece
                        FROM dispositif
                        INNER JOIN piece ON dispositif.id_piece = piece.id
												INNER JOIN logement ON piece.id_logement = logement.id
                        INNER JOIN utilisateur ON logement.id = utilisateur.id
                        WHERE utilisateur.id = :id AND dispositif.type_dispositif = :type_dispositif');
  $req -> execute(array('id' => $id, 'type_dispositif' => $type_dispositif));
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
  $req = $db -> prepare('SELECT COUNT(type_dispositif) AS nb, type_dispositif AS type FROM dispositif WHERE id_piece = ?
                        GROUP BY type_dispositif ORDER BY type');
  $req -> execute(array($id_piece));
  return $req;
}

function select_room_name($db, $id_piece) {
  $req = $db -> prepare('SELECT piece FROM piece WHERE id = ?');
  $req -> execute(array($id_piece));
  $data = $req -> fetch();
  return $data['piece'];
}

function select_device($db, $id_piece) {
  $req = $db -> prepare('SELECT * FROM dispositif WHERE id_piece = ? ORDER BY id');
  $req -> execute(array($id_piece));
  return $req;
}

// fonction affichant renvoyant 6 mails de la bdd pour affichage sur la page boite de réception
function select_6_mail($db, $mail_user, $num_count) {
  $req = $db -> prepare('SELECT *, DATE_FORMAT(date_envoi, \'%d/%m/%Y\') AS date_format FROM messagerie WHERE mail_receveur = ?
                        ORDER BY date_envoi DESC LIMIT '.$num_count.', 6');
  $req -> execute(array($mail_user));
  return $req;
}

function count_nb_page($db, $mail_user) {
  $req = $db -> prepare('SELECT COUNT(*) AS nb_mail FROM messagerie WHERE mail_receveur = ?');
  $req -> execute(array($mail_user));
  $info = $req -> fetch();
  $pages = $info['nb_mail'] / 6;
  return ceil($pages);
}

function select_6_mail_sent($db, $mail_user, $num_count) {
  $req = $db -> prepare('SELECT *, DATE_FORMAT(date_envoi, \'%d/%m/%Y\') AS date_format FROM messagerie WHERE mail_envoyeur = ?
                        ORDER BY date_envoi DESC LIMIT '.$num_count.', 6');
  $req -> execute(array($mail_user));
  return $req;
}

function count_nb_page_sent($db, $mail_user) {
  $req = $db -> prepare('SELECT COUNT(*) AS nb_mail FROM messagerie WHERE mail_envoyeur = ?');
  $req -> execute(array($mail_user));
  $info = $req -> fetch();
  $pages = $info['nb_mail'] / 6;
  return ceil($pages);
}

// fonction vérifiant si l'utilisateur a saisi un mail existant dans la table choisie
function verif_mail($db, $table, $mail) {
  $req = $db -> prepare('SELECT * FROM '.$table.' WHERE mail = :mail');
  $req -> execute(array('mail' => $mail));
  return $req;
}

function select_info_mail($db, $id_mail) {
  $req = $db -> prepare('SELECT *, DATE_FORMAT(date_envoi, \'%d/%m/%Y\') AS jour_envoi, DATE_FORMAT(date_envoi, \'%Hh%i\') AS heure_envoi
                        FROM messagerie WHERE id = ?');
  $req -> execute(array($id_mail));
  $info = $req -> fetch();
  return $info;
}

function select_info_perso_mail($db, $table, $mail) {
  $req = $db -> prepare('SELECT * FROM '.$table.' WHERE mail = :mail');
  $req -> execute(array('mail' => $mail));
  return $req;
}

function count_nb_unread_mail($db, $mail) {
  $req = $db -> prepare('SELECT COUNT(*) AS nb_unread_mail FROM messagerie WHERE mail_receveur = ? AND lecture = \'non\'');
  $req -> execute(array($mail));
  $info = $req -> fetch();
  return $info['nb_unread_mail'];
}

function select_mesure_choice($db, $id, $id_device) {
  $req = $db -> prepare ('SELECT mesure.mesure, DATE_FORMAT(mesure.date_mesure, \'le %d/%m/%Y à %H:%i:%s\') AS date_format
                          FROM mesure INNER JOIN dispositif ON mesure.id_dispositif = dispositif.id INNER JOIN piece ON dispositif.id_piece = piece.id
                          INNER JOIN logement ON piece.id_logement = logement.id WHERE logement.id = :id_logement AND mesure.id_dispositif = :id_dispositif
                          ORDER BY mesure.id DESC');
  $req -> execute(array("id_logement" => $id, 'id_dispositif' => $id_device));
  return $req;
}

function select_id_new_device($db, $id_piece, $type_dispositif) {
  $req = $db -> prepare ('SELECT MAX(id) AS id FROM dispositif WHERE id_piece = :id_piece AND type_dispositif = :type_dispositif');
  $req -> execute(array("id_piece" => $id_piece, 'type_dispositif' => $type_dispositif));
  $info = $req -> fetch();
  return $info['id'];
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

function insert_device($db, $id_piece, $dispositif) {
  $req = $db -> prepare('INSERT INTO dispositif(id_piece, type_dispositif, etat) VALUES(:id_piece, :dispositif, \'on\')');
  $req -> execute(array('id_piece' => $id_piece, 'dispositif' => $dispositif));
}

function insert_mail($db, $mail_receveur, $type_receveur, $mail_envoyeur, $type_envoyeur, $objet, $contenu) {
  $req = $db -> prepare('INSERT INTO messagerie(mail_receveur, type_receveur, mail_envoyeur, type_envoyeur, objet, contenu, date_envoi, lecture)
                        VALUES (:mail_receveur, :type_receveur, :mail_envoyeur, :type_envoyeur, :objet, :contenu, NOW(), \'non\')');
  $req -> execute(array('mail_receveur' => $mail_receveur,
                        'type_receveur' => $type_receveur,
                        'mail_envoyeur' => $mail_envoyeur,
                        'type_envoyeur' => $type_envoyeur,
                        'objet' => $objet,
                        'contenu' => $contenu));
}

function insert_state_device($db, $id_device, $mesure) {
  $req = $db -> prepare('INSERT INTO mesure(id_dispositif, mesure, date_mesure) VALUES (:id_device, :mesure, NOW())');
  $req -> execute(array('id_device' => $id_device, 'mesure' => $mesure));
}

/*****************************************************************UPDATE***********************************************************************/

// fonction modifiant le nb de piece d'un logement
function update_nb_piece($db, $id_logement, $nb_piece) {
  $req = $db -> prepare('UPDATE logement SET nb_piece = :nb_piece WHERE id_user = :id_logement');
  $req -> execute(array('id_logement' => $id_logement, 'nb_piece' => $nb_piece));
}

// fonction modifiant les infos utilisateurs
function update_info_user($db, $id, $civilite, $nom, $prenom, $date_naissance, $nationalite, $pays_utilisateur, $mail, $telephone,
                          $paiement, $identifiant) {
  $req = $db -> prepare('UPDATE utilisateur
                        SET civilite = :civilite, nom = :nom, prenom = :prenom, date_naissance = :date_naissance,
                        nationalite = :nationalite, pays = :pays_utilisateur, mail = :mail, telephone = :telephone,
                        info_paiement = :paiement, identifiant = :identifiant WHERE id = :id');
  $req -> execute(array('civilite' => $civilite, 'nom' => $nom, 'prenom' => $prenom, 'date_naissance' => $date_naissance,
                        'nationalite' => $nationalite, 'pays_utilisateur' => $pays_utilisateur, 'mail' => $mail,
                        'telephone' => $telephone, 'paiement' => $paiement, 'identifiant' => $identifiant, 'id' => $id));
}

function update_info_home($db, $id, $adresse, $code_postal, $ville, $pays_logement, $superficie, $nb_habitant) {
  $req = $db -> prepare('UPDATE logement
                        SET adresse = :adresse, code_postal = :code_postal, ville = :ville,
                        pays = :pays_logement, superficie = :superficie, nb_habitant = :nb_habitant WHERE id = :id');
  $req -> execute(array('adresse' => $adresse, 'code_postal' => $code_postal, 'ville' => $ville, 'pays_logement' => $pays_logement,
                        'superficie' => $superficie, 'nb_habitant' => $nb_habitant, 'id' => $id));
}

function update_pass_user($db, $id, $pass) {
  $req = $db -> prepare('UPDATE utilisateur SET mot_de_passe = :pass WHERE id = :id');
  $req -> execute(array('pass' => $pass, 'id' => $id));
}

function update_reading_mail($db, $id_mail) {
  $req = $db -> prepare('UPDATE messagerie SET lecture = \'oui\' WHERE messagerie.id = ?');
  $req -> execute(array($id_mail));
}

function update_unreading_mail($db, $id_mail) {
  $req = $db -> prepare('UPDATE messagerie SET lecture = \'non\' WHERE messagerie.id = ?');
  $req -> execute(array($id_mail));
}

function update_mail($db, $previous_mail, $new_mail) {
  $req1 = $db -> prepare('UPDATE messagerie SET mail_envoyeur = :new_mail WHERE mail_envoyeur = :previous_mail');
  $req1 -> execute(array('previous_mail' => $previous_mail, 'new_mail' => $new_mail));
  $req1 -> closeCursor();
  $req2 = $db -> prepare('UPDATE messagerie SET mail_receveur = :new_mail WHERE mail_receveur = :previous_mail');
  $req2 -> execute(array('previous_mail' => $previous_mail, 'new_mail' => $new_mail));
}

function update_state_checkbox($db, $id_device,  $etat) {
  $req = $db -> prepare('UPDATE dispositif SET etat = :etat WHERE dispositif.id = :id_device');
  $req -> execute(array('id_device' => $id_device, 'etat' => $etat));
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

function delete_device($db, $id_device) {
  $req = $db -> prepare('DELETE FROM dispositif WHERE id = ?');
  $req -> execute(array($id_device));
}

function delete_mail($db, $id_mail) {
  $req = $db -> prepare('DELETE FROM messagerie WHERE id = ?');
  $req -> execute(array($id_mail));
}
