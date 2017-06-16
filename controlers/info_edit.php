<?php
/*
controleur gérant :
  - l'extraction des données néccessaires pour l'affichage de la page "info_edit.php"
  - l'insertion des données dans la bdd après validation du formulaire de modification des infos de l'user sur la page "info_edit.php"
*/

if (isset($_POST['civilite'])) {
  include_once('modeles/functions.php');
  if ($_SESSION['type'] == 'user') {
    $previous_mail = select_mail_user($bdd, $_SESSION['id']);
  } else {
    $previous_mail = select_mail_admin($bdd, $_SESSION['id']);
  }

  update_mail($bdd, $previous_mail, $_POST['mail']);

  update_info_user($bdd, $_SESSION['id'], $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['date_naissance'],
                  $_POST['nationalite'], $_POST['pays_utilisateur'], $_POST['mail'], $_POST['telephone'], $_POST['paiement'],
                  $_POST['identifiant']);
  update_info_home($bdd, $_SESSION['id'], $_POST['adresse'], $_POST['code_postal'], $_POST['ville'], $_POST['pays_logement'],
                  $_POST['superficie'], $_POST['nb_habitant']);
  if ($_POST['ancien_mdp'] != "" && $_POST['nouveau_mdp'] != "" && $_POST['conf_mdp'] != "") {
    $ancien_mdp = sha1($_POST['ancien_mdp']);
    if ($ancien_mdp == select_password_user($bdd, $_SESSION['id'])) {
      if ($_POST['nouveau_mdp'] == $_POST['conf_mdp']) {
        $nouveau_mdp = sha1($_POST['nouveau_mdp']);
        update_pass_user($bdd, $_SESSION['id'], $nouveau_mdp);
        $message = 'Le mot de passe a bien été modifié.';
        include('controlers/info_user.php');
      } else {
        $erreur = 'le nouveau mot de passe et sa confirmation ne sont pas les mêmes.';
        $data = select_full_info_user($bdd, $_SESSION['id']);
        $my_full_info = array(array(maj_lettre1($data['civilite']), $data['nom'], maj_lettre1($data['prenom']), $data['date_naissance'],
                                    maj_lettre1($data['nationalite']), maj_lettre1($data['pays_utilisateur']), $data['mail'], $data['telephone']),
                              array($data['adresse'], $data['code_postal'], maj_lettre1($data['ville']), maj_lettre1($data['pays_logement']),
                                    $data['nb_piece'], $data['superficie'], $data['nb_habitant']),
                              array(maj_lettre1($data['info_paiement'])),
                              array($data['identifiant']));
        include('views/info_edit.php');
      }
    } else {
      $erreur = 'le mot de passe saisi ne correspond pas à l\'ancien.';
      $data = select_full_info_user($bdd, $_SESSION['id']);
      $my_full_info = array(array(maj_lettre1($data['civilite']), $data['nom'], maj_lettre1($data['prenom']), $data['date_naissance'],
                                  maj_lettre1($data['nationalite']), maj_lettre1($data['pays_utilisateur']), $data['mail'], $data['telephone']),
                            array($data['adresse'], $data['code_postal'], maj_lettre1($data['ville']), maj_lettre1($data['pays_logement']),
                                  $data['nb_piece'], $data['superficie'], $data['nb_habitant']),
                            array(maj_lettre1($data['info_paiement'])),
                            array($data['identifiant']));
      include('views/info_edit.php');
    }
  } else {
    if ($_POST['ancien_mdp'] != "" || $_POST['nouveau_mdp'] != "" || $_POST['conf_mdp'] != "") {
      $erreur = 'veuillez remplir tout les champs relatifs aux informations de connexion.';
      $data = select_full_info_user($bdd, $_SESSION['id']);
      $my_full_info = array(array(maj_lettre1($data['civilite']), $data['nom'], maj_lettre1($data['prenom']), $data['date_naissance'],
                                  maj_lettre1($data['nationalite']), maj_lettre1($data['pays_utilisateur']), $data['mail'], $data['telephone']),
                            array($data['adresse'], $data['code_postal'], maj_lettre1($data['ville']), maj_lettre1($data['pays_logement']),
                                  $data['nb_piece'], $data['superficie'], $data['nb_habitant']),
                            array(maj_lettre1($data['info_paiement'])),
                            array($data['identifiant']));
      include('views/info_edit.php');
    } else {
      $message = 'Les informations ont bien été modifiées.';
      include('controlers/info_user.php');
    }
  }
} else {
  include_once('modeles/functions.php');

  $data = select_full_info_user($bdd, $_SESSION['id']);

  $my_full_info = array(array(maj_lettre1($data['civilite']), $data['nom'], maj_lettre1($data['prenom']), $data['date_naissance'],
                              maj_lettre1($data['nationalite']), maj_lettre1($data['pays_utilisateur']), $data['mail'], $data['telephone']),
                        array($data['adresse'], $data['code_postal'], maj_lettre1($data['ville']), maj_lettre1($data['pays_logement']),
                              $data['nb_piece'], $data['superficie'], $data['nb_habitant']),
                        array(maj_lettre1($data['info_paiement'])),
                        array($data['identifiant']));

  include('views/info_edit.php');
}
