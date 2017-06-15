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

      insert_info_user($bdd, 1, maj_lettre1($_POST['civilite']), $_POST['nom'], maj_lettre1($_POST['prenom']), $_POST['login'],
                            $mot_de_passe, $_POST['date_naissance'], maj_lettre1($_POST['nationalite']), maj_lettre1($_POST['pays_user']),
                            $_POST['telephone'], $_POST['email'], $_POST['paiement']);

      insert_info_home($bdd, select_id_user($bdd, $_POST['login']), $_POST['adresse_logement'], $_POST['code_postal_logement'],
                      maj_lettre1($_POST['ville_logement']), maj_lettre1($_POST['pays_logement']), $_POST['nb_habitant'], 0,
                      $_POST['superficie']);

      insert_mail($bdd, $_POST['email'], "Utilisateur", "noreply@ehome.com", "Service client", "Bienvenue chez eHome !",
'Eliott,

Nous tenons à vous souhaiter la bienvenue chez eHome de la part de toute l\'équipe !

Votre maison peut dorénavant être totalement connectée comme bon vous semble. N\'hésitez pas à renseigner toutes vos informations personnelles ainsi que celles de votre domicile et à ajouter des dispositifs.

Vous pouvez à tout moment contacter un membre de notre équipe pour tout renseignement complémentaire.

Bonne connexion !

Bien cordialement,

l\'équipe eHome.

PS: cet e-mail a été envoyé automatiquement, il est inutile d\'y répondre. Pour plus d\'informations, contacter un administrateur système.');

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
