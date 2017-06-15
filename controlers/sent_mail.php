<?php
/*
controleur gérant l'extraction des données nécessaires à l'affichage de la page "Messagerie" de l'utilisateur
*/

include_once('modeles/functions.php');

if ($_SESSION['type'] == 'user') {
  $nb_page = count_nb_page($bdd, select_mail_user($bdd, $_SESSION['id']));
} else {
  $nb_page = count_nb_page($bdd, select_mail_admin($bdd, $_SESSION['id']));
}

if ($_SESSION['type'] == 'user') {
  $nb_unread_mail = count_nb_unread_mail($bdd, select_mail_user($bdd, $_SESSION['id']));
} else {
  $nb_unread_mail = count_nb_unread_mail($bdd, select_mail_admin($bdd, $_SESSION['id']));
}

if(!isset($_GET['page']) || $_GET['page'] == 1) {

  if ($_SESSION['type'] == 'user') {
    $mail_user = select_6_mail_sent($bdd, select_mail_user($bdd, $_SESSION['id']), 0);
  } else {
    $mail_user = select_6_mail_sent($bdd, select_mail_admin($bdd, $_SESSION['id']), 0);
  }


  if ($mail_user -> rowcount() == 0) {
    $mails = array();
    include('views/sent_mail.php');
  } else {
    $mails = array();
    $i = 0;
    while ($info_mail = $mail_user -> fetch()) {
      $mails[$i][0] = $info_mail['mail_receveur'];
      $mails[$i][1] = '('.$info_mail['type_receveur'].')';
      $mails[$i][2] = $info_mail['objet'];
      $mails[$i][3] = $info_mail['date_format'];
      $mails[$i][4] = $info_mail['id'];
      $i++;
    }

    include('views/sent_mail.php');
  }

} else {
  $num_count = ($_GET['page'] - 1) * 6;

  if ($_SESSION['type'] == 'user') {
    $mail_user = select_6_mail_sent($bdd, select_mail_user($bdd, $_SESSION['id']), 0);
  } else {
    $mail_user = select_6_mail_sent($bdd, select_mail_admin($bdd, $_SESSION['id']), 0);
  }

  $i = 0;
  while ($info_mail = $mail_user -> fetch()) {
    $mails[$i][0] = $info_mail['mail_receveur'];
    $mails[$i][1] = '('.$info_mail['type_receveur'].')';
    $mails[$i][2] = $info_mail['objet'];
    $mails[$i][3] = $info_mail['date_format'];
    $mails[$i][4] = $info_mail['id'];
    $i++;
  }

  include('views/sent_mail.php');
}
