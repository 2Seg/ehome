<?php
/*
controleur gérant le traitement des données saisies par l'user à partir de la page "Nouveau message"
*/

include_once('modeles/functions.php');

if (isset($_GET['cible']) && $_GET['cible'] == 'contr_new_mail') {
  if(isset($_POST['mail_receveur']) && isset($_POST['type_receveur']) && isset($_POST['objet']) && isset($_POST['contenu'])) {
    $verif_mail = verif_mail($bdd, $_POST['type_receveur'], $_POST['mail_receveur']);

    if ($verif_mail -> rowcount() == 0) {
      $message = 'L\'e-mail saisi n\'a aucune correspondance dans la base de données.';
      include('views/new_mail.php');
    } else {
      // $test = select_mail_user($bdd, $_SESSION['id']);
      // if ($test == false) {
      //   $test == select_mail_admin($bdd, $_SESSION['id']);
      //   if ($test == false) {
      //     $message = 'Erreur inconnue.';
      //     include('views/new_mail.php');
      //   } else {
      //     $mail_envoyeur = $test;
      //     $type_envoyeur = "Administrateur";
      //   }
      // } else {
      //   $mail_envoyeur = $test;
      //   $type_envoyeur = "Utilisateur";
      // }

      if ($_SESSION['type'] == 'user') {
        $mail_envoyeur = select_mail_user($bdd, $_SESSION['id']);
        $type_envoyeur = "Utilisateur";
      } else {
        $mail_envoyeur = select_mail_admin($bdd, $_SESSION['id']);
        $type_envoyeur = "Administrateur";
      }

      insert_mail($bdd, $_POST['mail_receveur'], maj_lettre1($_POST['type_receveur']), $mail_envoyeur, $type_envoyeur, $_POST['objet'], $_POST['contenu']);
      $message = 'L\'e-mail a bien été envoyé.';
      include('controlers/messaging.php');
    }

  } else {
    echo($_POST['mail_receveur']);echo($_POST['type_receveur']);echo($_POST['objet']);echo($_POST['contenu']);
    $message = 'Erreur : les champs du formulaire n\'ont pas tous été remplis.';
    include('views/new_mail.php');

  }

} else {
  include('views/error.php');
}
