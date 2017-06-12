<?php
/*
controleur gérant la suppression de mails
*/

include_once('modeles/functions.php');

if (isset($_GET['id_mail'])) {
  delete_mail($bdd, $_GET['id_mail']);

  include('controlers/messaging.php');

} else {
  foreach ($_POST as $cle => $element) {
    delete_mail($bdd, $cle);
  }
  
  include('controlers/messaging.php');
}
