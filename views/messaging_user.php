<?php
/*
vue gérant l'affichage de la page "Messagerie" de l'utilisateur
*/

$titre = 'Messagerie';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = 'messagerie';

$footer = footer();

include('gabarit.php');
