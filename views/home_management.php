<?php
/*
vue gérant l'affichage de la page "Gestion du domicile"
*/
$titre = 'Gestion du domicile';

print_r($info_device);
echo('<br>'.count($info_device));

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = my_home_info($info_home);
// $my_home = array('Salon', array(2, 'capteur de luminosité', 1, 'capteur de température', 3, 'capteur d\'humidité'),
//                 'Chambre', array(1, 'caméra', 2, 'capteur d\'humidité'),
//                 'Cuisine', array());
$my_home = array();

$contenu .= my_home_management($my_home);

$footer = footer();

include('gabarit.php');
?>
