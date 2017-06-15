<?php
/*
controleur gérant l'extraction des données nécessaires à l'affichage de la page "Nouveau message"
*/

include_once('modeles/functions.php');

if ($_SESSION['type'] == 'user') {
  $nb_unread_mail = count_nb_unread_mail($bdd, select_mail_user($bdd, $_SESSION['id']));
} else {
  $nb_unread_mail = count_nb_unread_mail($bdd, select_mail_admin($bdd, $_SESSION['id']));
}

include('views/new_mail.php');
