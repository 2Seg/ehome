<?php
/*
vue utilisée lorsque l'utilisateur ne saisi pas correctement les informations dans le formulaire d'inscription'
*/

$titre = 'Nous rejoindre';

$menu = menu($_SESSION['type']);

$contenu = '<h2>Erreur dans le formulaire d\'inscription : '.$erreur.'</h2>';
$contenu .= form_subscribe_user();

include('gabarit.php');
?>
