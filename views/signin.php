<?php
/*
vue permettant à l'utilisateur de se connecter
*/
$titre = 'Connexion';
$menu = menu($_SESSION['type']);

$contenu = form_signin('');
$footer = footer('');

include('gabarit.php');
?>
