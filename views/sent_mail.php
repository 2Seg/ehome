<?php
/*
vue gérant l'affichage de la page "Messages envoyés" de l'utilisateur
*/

$titre = 'Messages envoyés';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

// $mails = array(array("François Dupond", "(Administrateur)", "Votre abonnement", "6 juin", "non"),
//                   array("Sylvie Joelle", "(Administrateur)", "RE: Ajout d'un actionneur portail", "5 juin", "oui"),
//                   array("eHome", "(Service client)", "Confirmation de l'ajout de votre capteur d'humidité dans votre cuisine", "3 juin", "oui"),
//                   array("Sylvie Joelle", "(Administrateur)", "Bienvenue chez vous !", "1 juin", "oui"),
//                   array("eHome", "(Service client)", "NoReply: Bienvenue chez eHome Eliott !", "1 juin", "oui"),
//                   array("Francis Carault", "(Utilisateur)", "Bonne installation Eliott !", "24 mai", "oui"));
 // $mails = array();
// $nb_page = 1;
// print_r($mails);

$contenu = menu_messaging($titre);
$contenu .= sent_mail($mails, $nb_page);

$footer = footer();

include('gabarit.php');
