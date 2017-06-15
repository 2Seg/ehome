<?php
/*
vue gérant l'affichage de la page "Messagerie" de l'utilisateur
*/

$titre = 'Boite de réception';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

// $mails = array(array("François Dupond", "(Administrateur)", "Votre abonnement", "6 juin", "non"),
//                   array("Sylvie Joelle", "(Administrateur)", "RE: Ajout d'un actionneur portail", "5 juin", "oui"),
//                   array("eHome", "(Service client)", "Confirmation de l'ajout de votre capteur d'humidité dans votre cuisine", "3 juin", "oui"),
//                   array("Sylvie Joelle", "(Administrateur)", "Bienvenue chez vous !", "1 juin", "oui"),
//                   array("eHome", "(Service client)", "NoReply: Bienvenue chez eHome Eliott !", "1 juin", "oui"),
//                   array("Francis Carault", "(Utilisateur)", "Bonne installation Eliott !", "24 mai", "oui"));
// $mails = array();
// $nb_page = 2;
// print_r($mails);

$contenu = menu_messaging($titre, $nb_unread_mail);
$contenu .= mailbox($mails, $nb_page);

if(isset($message)) {
  ?>
  <script type="text/javascript">
    alert("<?php echo($message); ?>");
  </script>
  <?php
}

$footer = footer();

include('gabarit.php');
