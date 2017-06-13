<?php
/*
controleur gérant l'extraction des données nécessaires à l'affichage des mails
*/

include_once('modeles/functions.php');

update_reading_mail($bdd, $_GET['id_mail']);

// $info_mail = array(array("Service", "Client", "eHome", "Service client", "noreply@ehome.com"),
//                         array("11/06/17", "15h02", "Bienvenue chez nous !", "Et blabla bli et blabla bla ..."));

$info_mail = array(array(), array());

$info_mail_user = select_info_mail($bdd, $_GET['id_mail']);

$type_envoyeur = $info_mail_user['type_envoyeur'];
$mail_envoyeur = $info_mail_user['mail_envoyeur'];

if ($type_envoyeur == "Service client") {
  $info_mail[0][0] = "Service";
  $info_mail[0][1] = "client";
  $info_mail[0][2] = "eHome";
  $info_mail[0][3] = $type_envoyeur;
  $info_mail[0][4] = $mail_envoyeur;

} else {
  $data_user = select_info_user_mail($bdd, strtolower_utf8($type_envoyeur), $mail_envoyeur);

  $info_user = $data_user -> fetch();

  $info_mail[0][0] = $info_user['civilite'];
  $info_mail[0][1] = $info_user['prenom'];
  $info_mail[0][2] = $info_user['nom'];
  $info_mail[0][3] = $type_envoyeur;
  $info_mail[0][4] = $mail_envoyeur;
}

$info_mail[1][0] = $info_mail_user['jour_envoi'];
$info_mail[1][1] = $info_mail_user['heure_envoi'];
$info_mail[1][2] = $info_mail_user['objet'];
$info_mail[1][3] = $info_mail_user['contenu'];

// print_r($info_mail);

include('views/answer_mail.php');
