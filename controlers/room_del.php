<?php
/*
controleur gérant la suppression de pièces
*/

include_once('modeles/functions.php');

delete_room($bdd, $_SESSION['id'], $_GET['id_piece']);

update_nb_piece($bdd, $_SESSION['id'], count_piece($bdd, $_SESSION['id']));

include("controlers/home_management.php");
