<?php
/*
vue utilisée lorsque l'utilisateur ne saisi pas correctement les informations dans le formulaire de connexion
*/

$titre = 'Connexion';

$menu = menu();

$contenu = form_signin($erreur);

$footer = footer();

include('gabarit.php');
?>
