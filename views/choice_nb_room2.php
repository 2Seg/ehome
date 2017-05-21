<?php
/*
vue gérant l'affichage de la page de choix des capteurs à mettre dans les nouvelles pièces à ajouter
*/

$titre = 'Sélectionner pièces';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

// affichage des pièces déjà existantes
$contenu = my_actual_room();

$contenu .= form_nb_room2();

$footer = footer();

include('gabarit.php');
