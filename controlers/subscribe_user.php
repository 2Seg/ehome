<?php
/*
controleur gérant l'inscription au site
*/

// On vérifie que l'utilisateur a validé le formulaire de connexion
if(isset($_GET['cible']) && $_GET['cible'] == 'form_subscribe_user') {
  include ('modeles/functions.php');
  // on vérifie que le pseudo n'est pas déjà utilisé
  if(user_existe_deja($bdd, $_POST['login']) == false) {
    if($_POST['password'] == $_POST['conf_password']) {
      $mot_de_passe = sha1($_POST['password']);

      insert_info_user($bdd, 1, $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['login'], $mot_de_passe,
                            $_POST['date_naissance'], $_POST['nationalite'], $_POST['pays_user'], $_POST['telephone'], $_POST['email'],
                            $_POST['paiement']);

      insert_info_home($bdd, select_id_user($bdd, $_POST['login']), $_POST['adresse_logement'], $_POST['code_postal_logement'],
                      $_POST['ville_logement'], $_POST['pays_logement'], $_POST['nb_habitant'], 0, $_POST['superficie']);

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
