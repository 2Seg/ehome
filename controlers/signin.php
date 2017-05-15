<?php
/*
controleur gérant la connexion utilisateur au site, notamment les cas d'erreur
*/

// on vérifie que l'user a validé le formulaire de connexion
if(isset($_GET['cible']) && $_GET['cible'] == 'connect') {
  // on vérifie que l'utilisateur a rempli tous les champs
  if(!empty($_POST['login']) && !empty($_POST['password'])) {
    include ('modeles/functions.php');
    $donnees = user_in_db($bdd, $_POST['login']); // on récupère les données de la bdd

    if ($donnees -> rowcount() == 0) {
      // user non trouvé dans la bdd
      $erreur = 'utilisateur inconnu.';
      include('views/signin_error.php');

    } else {
      // user trouvé dans la bdd
      $ligne = $donnees->fetch(); // on extrait les données (pour qu'elles soient exploitables)
      if(/*sha1(*/$_POST['password']/*)*/ == $ligne['mot_de_passe']) {
        $erreur = '';
        $_SESSION['id'] = $ligne['id'];
        $_SESSION['type'] = 'user';
        include('views/home.php');
      } else {
        $erreur = 'le mot de passe est incorrect';
        include('views/signin_error.php');
      }
    }

  } elseif (!empty($_POST['login']) && empty($_POST['password'])) {
    // user n'a pas saisi de mot de passe
    $erreur = 'veuillez saisir un mot de passe.';
    include('views/signin_error.php');

  } elseif (empty($_POST['login']) && !empty($_POST['password'])) {
    // user n'a pas saisi d'identifiant
    $erreur = 'veuillez saisir un identifiant.';
    include('views/signin_error.php');

  } else {
    // user n'a pas rempli les champs
    $erreur = 'veuillez remplir l\'intégralité des champs.';
    include('views/signin_error.php');
  }

} else {
  include('views/signin.php');
}
