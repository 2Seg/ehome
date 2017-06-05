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
