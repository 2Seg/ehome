<?php
/*
controleur gérant l'extraction des données nécessaires à l'affichage des mails
*/

include_once('modeles/functions.php');

if (isset($_GET['previous'])) {
  $isset_previous_page = $_GET['previous'];
}

if ($_SESSION['type'] == 'user') {
  $nb_unread_mail = count_nb_unread_mail($bdd, select_mail_user($bdd, $_SESSION['id']));
} else {
  $nb_unread_mail = count_nb_unread_mail($bdd, select_mail_admin($bdd, $_SESSION['id']));
}

update_reading_mail($bdd, $_GET['id_mail']);

// $info_mail = array(array("Service", "Client", "eHome", "Service client", "noreply@ehome.com"),
//                         array("11/06/17", "15h02", "Bienvenue chez nous !", "Et blabla bli et blabla bla ..."));

$info_mail = array(array(), array());

$info_mail_perso = select_info_mail($bdd, $_GET['id_mail']);
$type_envoyeur = $info_mail_perso['type_envoyeur'];
$mail_envoyeur = $info_mail_perso['mail_envoyeur'];

if ($type_envoyeur == "Service client") {
  $info_mail[0][0] = "Service";
  $info_mail[0][1] = "client";
  $info_mail[0][2] = "eHome";
  $info_mail[0][3] = $type_envoyeur;
  $info_mail[0][4] = $mail_envoyeur;

} else {
  $data_perso = select_info_perso_mail($bdd, strtolower_utf8($type_envoyeur), $mail_envoyeur);

  $info_perso = $data_perso -> fetch();

  $info_mail[0][0] = $info_perso['civilite'];
  $info_mail[0][1] = $info_perso['prenom'];
  $info_mail[0][2] = $info_perso['nom'];
  $info_mail[0][3] = $type_envoyeur;
  $info_mail[0][4] = $mail_envoyeur;
}

$info_mail[1][0] = $info_mail_perso['jour_envoi'];
$info_mail[1][1] = $info_mail_perso['heure_envoi'];
$info_mail[1][2] = $info_mail_perso['objet'];
$info_mail[1][3] = $info_mail_perso['contenu'];

if ($_SESSION['type'] == 'user') {
  $nb_unread_mail = count_nb_unread_mail($bdd, select_mail_user($bdd, $_SESSION['id']));
} else {
  $nb_unread_mail = count_nb_unread_mail($bdd, select_mail_admin($bdd, $_SESSION['id']));
}

include('views/answer_mail.php');
