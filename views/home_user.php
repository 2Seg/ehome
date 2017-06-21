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
$data_state = array("piece",
                    array(1, "Salon"),
                    array(15, "Alarme", "off", "", ""),
                    array(21, "Capteur de luminosité", "on","25", "29/06/2017 19:12"),
                    array(17, "Détecteur de mouvement", "on", "non", "29/06/2017 19:12:15"),
                    array(42, "Actionneur volet", "on","haut", "29/06/2017 19h12"),
                    array(75, "Caméra de surveillance", "on", "", ""));

$contenu = my_notif();
$contenu .= my_basic_info($general_info_user);
$contenu .= form_device_state($list_room_user, $list_device_user);
$contenu .= device_state($data_state);

$footer = footer();

include('gabarit.php');
