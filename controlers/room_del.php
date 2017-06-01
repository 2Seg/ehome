<?php
/*
controleur gérant la suppression de pièces
*/

include_once('modeles/functions.php');

delete_room($bdd, $_SESSION['id'], $_GET['id_piece']);

include("controlers/home_management.php");
