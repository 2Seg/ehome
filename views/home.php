<?php
/*
vue gérant l'affichage de la page "Accueil"
*/
$titre = 'Accueil';

$menu = menu($_SESSION['type']);

$contenu = 'Accueil';

include('gabarit.php');
?>
