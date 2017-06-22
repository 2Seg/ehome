<?php
/*
vue gérant l'affichage de la page "Accueil utilisateur"
*/

$titre = 'Domicile de '.$_SESSION['identifiant'];

$menu = menu();
$menu .= menu_user($_SESSION['type']);

// $list_room_user = array("Salon 45", "Chambre 78", "Bureau 19");
// $list_device_user = array("Capteur de luminosité 11", "Capteur de température 42", "Capteur d\'humidité 18", "Détecteur de mouvement 78",
//                           "Actionneur porte 45", "Actionneur fenêtre 65");
/*affichage par pièce :*/
$data_state = array("piece",
                    array(1, "Salon"),
                    array(18, "Alarme", "on", "oui", "le 22/06/17 à 11h07", "Salon (n°12)"),
                    array(24, "Capteur de luminosité", "on", "48", "le 22/06/17 à 11:07", "Bureau (n°45)"),
                    array(3, "Capteur de température", "on", "24", "le 22/06/17 à 11:07", "Chambre (n°1)"),
                    array(48, "Capteur d'humidité", "on", "18", "le 22/06/17 à 11:07", "Chambre (n°1)"),
                    array(75, "Détecteur de mouvement", "on", "oui", "le 22/06/17 à 11:07:15", "Chambre (n°1)"),
                    array(7564, "Détecteur de fumée", "on", "non", "le 22/06/17 à 11:07:15", "Chambre (n°1)"),
                    array(487, "Actionneur chauffage", "on", "7", "le 22/06/17 à 11:07", "Chambre (n°1)"),
                    array(34, "Actionneur climatisation", "on", "1", "le 22/06/17 à 11:07", "Chambre (n°1)"),
                    array(25, "Actionneur porte", "on", "5", "le 22/06/17 à 11:07", "Chambre (n°1)"),
                    array(56, "Actionneur fenêtre", "on", "4", "le 22/06/17 à 11:07", "Chambre (n°1)"),
                    array(8, "Actionneur volet", "on", "1", "le 22/06/17 à 11:07", "Chambre (n°1)"),
                    array(7, "Actionneur portail", "on", "5", "le 22/06/17 à 11:07", "Chambre (n°1)"),
                    array(123, "Actionneur lumière", "on", "1", "le 22/06/17 à 11:07", "Chambre (n°1)"),
                    array(99, "Caméra de surveillance", "on", "acquisition", "le 22/06/17 à 11:07:15", "Chambre (n°1)"));

/*affichage par type de capteur*/
// $data_state = array("dispositif",
//                     array("", "Capteur de luminosité"),
//                     array(18, "Capteur de luminosité", "on", "24", "le 22/06/17 à 11h07", "Salon (n°12)"),
//                     array(24, "Capteur de luminosité", "on", "25", "le 22/06/17 à 11:07", "Bureau (n°45)"),
//                     array(3, "Capteur de luminosité", "on", "51", "le 22/06/17 à 11:07", "Chambre (n°1)"),
//                     array(48, "Capteur de luminosité", "on", "53", "le 22/06/17 à 11:07", "Entrée (n°44)"),
//                     array(75, "Capteur de luminosité", "on", "36", "le 22/06/17 à 11:07", "Cuisine (n°4)"),
//                     array(7564, "Capteur de luminosité", "on", "18", "le 22/06/17 à 11:07", "Toilettes (n°28)"),
//                     array(487, "Capteur de luminosité", "off", "7", "le 22/06/17 à 11:07", "Chambre (n°56)"));

// $data_state = array();

$contenu = my_notif();
$contenu .= my_basic_info($general_info_user);
$contenu .= form_device_state($list_room_user, $list_device_user);
$contenu .= device_state($data_state);

$footer = footer();

include('gabarit.php');
