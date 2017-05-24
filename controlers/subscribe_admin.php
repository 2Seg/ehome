<?php
/*
controleur gérant l'inscription administrateur au site
*/

// On vérifie que l'utilisateur a validé le formulaire de connexion
if(isset($_GET['cible']) && $_GET['cible'] == 'subscribe_admin') {
  include ('modeles/functions.php');
  // on vérifie que le pseudo n'est pas déjà utilisé
  if(presence_admin($bdd, $_POST['login']) == false) {
    if($_POST['password'] == $_POST['conf_password']) {
      $mot_de_passe = sha1($_POST['password']);

      insert_info_admin($bdd, $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['login'], $mot_de_passe, $_POST['date_naissance'],
                       $_POST['nationalite'], $_POST['pays_admin'], $_POST['telephone'], $_POST['email'], 0);

      include('views/conf_join-us.php');
    } else {
      $erreur = 'le mot de passe et sa confirmation ne sont pas les mêmes.';
      include('views/join-us_error.php');
    }
  } else {
    $erreur = 'l\'identifiant choisi est déjà utilisé.';
    include('views/join-us_error.php');
  }
} else {
  include('views/join-us_type.php');
}
