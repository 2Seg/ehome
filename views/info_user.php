<?php
/*
vue gérant l'affichage de la page "Mes informations"
*/

$titre = "Mes informations";

$menu = menu();
$menu .= menu_user($_SESSION['type']);



$footer = footer();

include('gabarit.php');
