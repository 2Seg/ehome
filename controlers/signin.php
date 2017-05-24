<?php
/*
controleur gérant la connexion utilisateur au site, notamment les cas d'erreur
*/

if(isset($_GET['cible']) && $_GET['cible'] == 'connexion_request') {
  if(!empty($_POST['login']) && !empty($_POST['password'])) {
    include ('modeles/functions.php');
    $user_data = user_in_db($bdd, $_POST['login']);

    if ($user_data -> rowcount() == 0) {
      $admin_data = admin_in_db($bdd, $_POST['login']);

      if($admin_data -> rowcount() == 0) {
        $erreur = 'utilisateur inconnu.';
        include('views/signin_error.php');
      } else {
        include('controlers/signin_admin.php');
      }

    } else {
      $user_line = $user_data -> fetch();

      if(sha1($_POST['password']) == $user_line['mot_de_passe']) {
        $_SESSION['id'] = $user_line['id'];
        $_SESSION['identifiant'] = $user_line['identifiant'];
        $_SESSION['type'] = 'user';

        include('controlers/home_user.php'); // lien vers un autre controleur pour extraire les infos de la bdd pour affichage de la page "home_user.php"

      } else {
        $erreur = 'mot de passe est incorrect';
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
