<?php

$titre = 'Notre entreprise';

$menu = menu($_SESSION['type']);

$contenu = content_abouts_us();

$footer = footer();
include('gabarit.php');
?>
