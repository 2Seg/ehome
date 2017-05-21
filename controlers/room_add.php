<?php
/*
controleur gérant l'ajout de pièces
*/

include('modeles/functions.php');

update_nb_piece($bdd, $_SESSION['id_logement'], $_POST['nb_piece']);

$_SESSION['nb_piece'] = $_POST['nb_piece'];

include('views/sensor_add.php');
