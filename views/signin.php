<?php
/*
vue permettant à l'utilisateur de se connecter
*/
$titre = 'Connexion';
$menu = menu($_SESSION['type']);
$contenu = form_signin('');
$contenu .= form_capteur_piece(5);

include('gabarit.php');
?>
