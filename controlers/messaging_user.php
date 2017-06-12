<?php
/*
controleur gérant l'extraction des données nécessaires à l'affichage de la page "Messagerie" de l'utilisateur
*/

include_once('modeles/functions.php');

$nb_page = count_nb_page($bdd, select_mail_user($bdd, $_SESSION['id']));

if(!isset($_GET['page']) || $_GET['page'] == 1) {
  $mail_user = select_6_mail($bdd, select_mail_user($bdd, $_SESSION['id']), 0);

  if ($mail_user -> rowcount() == 0) {
    $mails = array();
    include('views/messaging_user.php');
  } else {
    $mails = array();
    $i = 0;
    while ($info_mail = $mail_user -> fetch()) {
      $mails[$i][0] = $info_mail['mail_envoyeur'];
      $mails[$i][1] = '('.$info_mail['type_envoyeur'].')';
      $mails[$i][2] = $info_mail['objet'];
      $mails[$i][3] = $info_mail['date_format'];
      $i++;
    }
    include('views/messaging_user.php');
  }

} else {
  $num_count = ($_GET['page'] - 1) * 6;
  $mail_user = select_6_mail($bdd, select_mail_user($bdd, $_SESSION['id']), $num_count);
  $i = 0;
  while ($info_mail = $mail_user -> fetch()) {
    $mails[$i][0] = $info_mail['mail_envoyeur'];
    $mails[$i][1] = '('.$info_mail['type_envoyeur'].')';
    $mails[$i][2] = $info_mail['objet'];
    $mails[$i][3] = $info_mail['date_format'];
    $i++;
  }
  include('views/messaging_user.php');
}

//include('views/messaging_user.php');
