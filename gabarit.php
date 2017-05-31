<!-- Fichier ajoutant la structure à chaque page du site ainsi que le CSS -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo($titre); ?></title>
    <link rel="icon" type="image/x-icon" href="views/ressources/logos/main_logo.png" />
    <link rel="stylesheet" href="views/styles/structure_new.css">
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
