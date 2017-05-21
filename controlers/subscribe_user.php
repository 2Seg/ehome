<?php
/*
controleur gérant l'inscription utilisateur au site
*/

// On vérifie que l'utilisateur a validé le formulaire de connexion
if(isset($_GET['cible']) && $_GET['cible'] == 'subscribe_user') {
  include ('modeles/functions.php');
  // on vérifie que le pseudo n'est pas déjà utilisé
  if(presence_user($bdd, $_POST['login']) == false) {
    // -> le pseudo n'est pas présent dans la bdd
    // on vérifie que le mot de passe et sa confirmation son identiques
    if($_POST['password'] == $_POST['conf_password']) {
      // on initialise id_admin, id_logement et id_abonnement
      $donnees1 = prepare_id($bdd);
      $ligne1 = $donnees1 -> fetch();

      $id_admin = $ligne1['admin']+1;
      $id_logement = $ligne1['logement']+1;
      $id_abonnement = $ligne1['abonnement']+1;

      // on hache le mot de passe (sécurité)
      $mot_de_passe = sha1($_POST['password']);

      // on ajoute les données à la bdd (infos personnelles)
      subscribe_perso($bdd, $id_admin, $id_logement, $id_abonnement, $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['login'], $mot_de_passe, $_POST['date_naissance'], $_POST['nationalite'], $_POST['pays_user'], $_POST['telephone'], $_POST['email'], $_POST['paiement']);

      // on récupère l'id du nouvel utilisateur ($ligne2['id'])
      $donnees2 = select_id_user($bdd, $_POST['login']);
      $ligne2 = $donnees2 -> fetch();


      // on ajoute les données à la bdd (infos sur le logement)
      subscribe_house($bdd, $ligne2['id'], $_POST['adresse_logement'], $_POST['code_postal_logement'], $_POST['ville_logement'], $_POST['pays_logement'], $_POST['nb_habitant'], 0, $_POST['superficie']);

      // on annonce à l'user qu'il est inscrit
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
