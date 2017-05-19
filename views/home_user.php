<?php
/*
vue gérant l'affichage de la page "Accueil"
*/

$titre = 'Domicile de '.$_SESSION['identifiant'];

$menu = menu($_SESSION['type']);
$menu .= menu_user($_SESSION['type']);

$contenu = 'Page "Mon domicile (utilisateur)"';

$footer = footer();

include('gabarit.php');
?>
