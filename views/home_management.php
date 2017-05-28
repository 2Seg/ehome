<?php
/*
vue gérant l'affichage de la page "Gestion du domicile"
*/
$titre = 'Gestion du domicile';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = my_home_info($info_home);

// $my_home = array('Salon', array(2, 'capteur de luminosité', 1, 'capteur de température', 3, 'capteur d\'humidité'),
//                 'Chambre', array(1, 'caméra', 2, 'capteur d\'humidité'),
//                 'Cuisine', array());

// $my_home = array('Salon', array(),
//                 'Chambre', array(),
//                 'Cuisine', array());

// $my_home = array();

print_r($my_home);

$contenu .= my_room($my_home);

$footer = footer();

include('gabarit.php');
?>
