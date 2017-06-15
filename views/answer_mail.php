<?php
/*
vue gérant l'affichage des mails et la réponse à un message affiché
*/

$titre = 'Message';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

// $info_mail = array(array("Monsieur", "Tom", "Jalabert", "Utilisateur", "tomjaja@gmail.com"),
//                   array("11/06/17", "15h02", "Bon courage amigo !", "Et blabla bli et blabla bla ..."));

// $info_mail = array(array("Service", "Client", "eHome", "Service client", "noreply@ehome.com"),
//                         array("11/06/17", "15h02", "Bienvenue chez nous !", "Et blabla bli et blabla bla ..."));

$contenu = menu_messaging($titre, $nb_unread_mail);
$contenu .= mail_print($info_mail);

if (!isset($isset_previous_page)) {
  $contenu .= new_mail($titre, $info_mail);
}


$footer = footer();

include('gabarit.php');
