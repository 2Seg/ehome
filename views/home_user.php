<?php
/*
vue gérant l'affichage de la page "Accueil utilisateur"
*/

$titre = 'Domicile de '.$_SESSION['identifiant'];

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = my_notif();
$contenu .= my_basic_info($general_info_user);

$footer = footer();

include('gabarit.php');
?>
