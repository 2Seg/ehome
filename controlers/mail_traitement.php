<?php
/*
controleur gérant la suppression de mails
*/

include_once('modeles/functions.php');

if (isset($_GET['id_mail'])) {
  delete_mail($bdd, $_GET['id_mail']);

  if ($_GET['page_precedente'] == 'reception') {
    include('controlers/messaging.php');
  } else {
    include('controlers/sent_mail.php');
  }

} else {
  if ($_POST['submit'] == "Supprimer") {
    foreach ($_POST as $cle => $element) {
        delete_mail($bdd, $cle);
    }
  } elseif ($_POST['submit'] == "Marquer comme lu") {
    foreach ($_POST as $cle => $element) {
        update_reading_mail($bdd, $cle);
    }
  } elseif ($_POST['submit'] == "Marquer comme non lu") {
    foreach ($_POST as $cle => $element) {
        update_unreading_mail($bdd, $cle);
    }
  }
  include('controlers/messaging.php');
}
