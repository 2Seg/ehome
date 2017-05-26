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
$contenu .= my_piece($info_home, $data_room, $info_device);

$footer = footer();

include('gabarit.php');
?>
