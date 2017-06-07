<?php
/*
vue permettant à l'utilisateur de se connecter
*/
$titre = 'Connexion';
$menu = menu();


if (isset($erreur) && $erreur != '') {
  $contenu = '<h2 class="except_h2">Erreur dans le formulaire de connexion : '.$erreur.'</h2>';
  $contenu .= form_signin();
} else {
  $contenu = form_signin();
}

$footer = footer();

include('gabarit.php');
?>
