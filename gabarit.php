<!-- Fichier ajoutant la structure à chaque page du site ainsi que le CSS -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo($titre); ?></title>
    <link rel="icon" type="image/x-icon" href="views/ressources/logos/main_logo.png" />
    <link rel="stylesheet" href="views/styles/structure_new.css">
    <?php
    if (substr($titre, 0, 11) == 'Domicile de') {
      echo('<link rel="stylesheet" href="views/styles/home_user.css">');
    } elseif ($titre == 'Gestion du domicile') {
      echo('<link rel="stylesheet" href="views/styles/home_management.css">');
    } elseif (substr($titre, 0, 36) == 'Gestion des dispositifs de la pièce') {
      echo('<link rel="stylesheet" href="views/styles/device_management.css">');
    } elseif ($titre == 'Mes informations') {
      echo('<link rel="stylesheet" href="views/styles/info_user.css">');
    } elseif ($titre == 'Modifier mes informations') {
      echo('<link rel="stylesheet" href="views/styles/info_edit.css">');
    } elseif ($titre == 'Mes notifications') {
      echo('<link rel="stylesheet" href="views/styles/notif_user.css">');
    } elseif (substr($titre, 0, 22) == 'Nous rejoindre') {
        echo('<link rel="stylesheet" href="views/styles/join-us_type.css">');
    } elseif ($titre == 'Boite de réception'  || $titre == 'Messages envoyés') {
      echo('<link rel="stylesheet" href="views/styles/messaging.css">');
    } elseif ($titre == 'Nouveau message') {
      echo('<link rel="stylesheet" href="views/styles/new_mail.css">');
    } elseif ($titre == 'Message') {
      echo('<link rel="stylesheet" href="views/styles/answer_mail.css">');
    } elseif (substr($titre, 0, 17) == 'Confirmation de l') {
        echo('<link rel="stylesheet" href="views/styles/conf_join-us.css">');
    } elseif ($titre == 'Mes notifications') {
      echo('<link rel="stylesheet" href="views/styles/notif_admin.css">');
    }

    elseif ($titre == 'Gestion des utilisateurs') {
      echo('<link rel="stylesheet" href="views/styles/user_management.css">');
    } elseif ($titre == 'Vos informations administrateur') {
      echo('<link rel="stylesheet" href="views/styles/info_admin.css">');
    } elseif ($titre == 'Modifier mes informations administrateur') {
        echo('<link rel="stylesheet" href="views/styles/admin_info_edit.css">');
    } elseif (substr($titre, 0, 22) == 'Accueil administrateur') {
      echo('<link rel="stylesheet" href="views/styles/home_admin.css">');
    } elseif ($titre == 'Nous rejoindre') {
        echo('<link rel="stylesheet" href="views/styles/join-us_type.css">');
    } elseif (substr($titre, 0, 12) == 'Gestion de l') {
        echo('<link rel="stylesheet" href="views/styles/gestion_user.css">');
    } elseif ($titre == 'Suppression utilisateur') {
        echo('<link rel="stylesheet" href="views/styles/user_suppression.css">');
    } elseif ($titre == 'Mes notifications administrateur') {
      echo('<link rel="stylesheet" href="views/styles/notif_admin.css">');
    } elseif ($titre == 'Sécurité') {
      echo('<link rel="stylesheet" href="views/styles/security.css">');
    }

    elseif ($titre == 'Connexion') {
      echo('<link rel="stylesheet" href="views/styles/signin.css">');
    } elseif ($titre == 'Erreur' || $titre == 'Déconnexion') {
      echo('<link rel="stylesheet" href="views/styles/error_or_disconnect.css">');
    }elseif ($titre == 'Accueil') {
      echo('<link rel="stylesheet" href="views/styles/home.css">');
    } elseif ($titre == 'Accueil') {
        echo('<link rel="stylesheet" href="views/styles/home.css">');
    } elseif ($titre == 'Notre entreprise') {
        echo('<link rel="stylesheet" href="views/styles/about_us.css">');
    } elseif ($titre == 'Mentions légales') {
      echo('<link rel="stylesheet" href="views/styles/legal_information.css">');
    }
    ?>

    <script type="text/javascript" src="views/jscarroussel.js"></script>
  </head>

  <body onload="Load()">
      <nav>
        <?php echo $menu;?>
      </nav>

      <aside>
        <?php echo($contenu); ?>
      </aside>

      <footer>
        <?php echo($footer); ?>
      </footer>
  </body>
</html>
