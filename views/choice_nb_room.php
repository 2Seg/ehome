<?php
/*
vue gérant l'affichage de la page de choix du nombre de pièces à ajouter
*/

$titre = 'Sélectionner pièces';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

// affichage des pièces déjà existantes
$contenu = my_actual_room();

$contenu .= form_nb_room();

$footer = footer();

include('gabarit.php');
