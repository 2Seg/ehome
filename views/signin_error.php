<?php
/*
vue utilisée lorsque l'utilisateur ne saisi pas correctement les informations dans le formulaire de connexion
*/
$menu = menu($_SESSION['type']);

$form_signin = form_signin($erreur);
