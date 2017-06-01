<?php
/*
controleur gérant la connexion utilisateur au site, notamment les cas d'erreur
*/

$admin_line = $admin_data->fetch(); // on extrait les données (pour qu'elles soient exploitables)
if(sha1($_POST['password']) == $admin_line['mot_de_passe']) {
  $_SESSION['id'] = $admin_line['id'];
  $_SESSION['identifiant'] = $admin_line['identifiant'];
  $_SESSION['type'] = 'admin';

  // lien vers un autre controleur pour extraire les infos de la bdd pour affichage de la page "home_admin.php"
  include('controlers/home_admin.php');
} else {
  $erreur = 'mot de passe est incorrect';
  include('views/signin_error.php');
}
