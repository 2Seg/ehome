<?php
/*
vue gérant l'affichage de la page "Messagerie" de l'utilisateur
*/

$titre = 'Messagerie';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$nb_unread_mail = 2;
$info_mail = array(array("François Dupond", "Administrateur", "Votre abonnement", "6 juin"),
                  array("Sylvie Joelle", "Administrateur", "RE: Ajout d'un actionneur portail", "5 juin"),
                  array("eHome", "Service client", "NoReply: Bienvenue chez eHome Eliott !", "3 juin"),
                  array("Francis Carault", "Utilisateur", "Bonne installation Eliott !", "3 juin"));
//array(NomEnvoyeur, TypeEnvoyeur, ObjetMail, DateMail);

$contenu = menu_messaging($nb_unread_mail);
$contenu .= mailbox($info_mail);

$footer = footer();

include('gabarit.php');
