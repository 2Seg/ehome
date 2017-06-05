<?php
/*
controleur gérant :
  - l'extraction des données néccessaires pour l'affichage de la page "info_edit.php"
  - l'insertion des données dans la bdd après validation du formulaire de modification des infos de l'user sur la page "info_edit.php"
*/

if (isset($_POST['civilite'])) {



  include('views/info_user.php');
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
