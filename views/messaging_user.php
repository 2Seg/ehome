<?php
/*
vue gérant l'affichage de la page "Messagerie" de l'utilisateur
*/

$titre = 'Messagerie';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$nb_unread_mail = 2;
$info_mail = array(array("François Dupond", "(Administrateur)", "Votre abonnement", "6 juin", "non"),
                  array("Sylvie Joelle", "(Administrateur)", "RE: Ajout d'un actionneur portail", "5 juin", "oui"),
                  array("eHome", "(Service client)", "Confirmation de l'ajout de votre capteur d'humidité dans votre cuisine", "3 juin", "oui"),
                  array("Sylvie Joelle", "(Administrateur)", "Bienvenue chez vous !", "1 juin", "oui"),
                  array("eHome", "(Service client)", "NoReply: Bienvenue chez eHome Eliott !", "1 juin", "oui"),
                  array("Francis Carault", "(Utilisateur)", "Bonne installation Eliott !", "24 mai", "oui"));

$current_page = 1;
$nb_page = 6;

$contenu = menu_messaging($nb_unread_mail);
$contenu .= mailbox($info_mail, $current_page, $nb_page);

$footer = footer();

include('gabarit.php');
