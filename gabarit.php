<!-- Fichier ajoutant la structure à chaque page du site ainsi que le CSS -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo($titre); ?></title>
    <link rel="icon" type="image/x-icon" href="ressources/logos/main_logo.png" />
    <link rel="stylesheet" href="views/styles/structure.css">
  </head>

  <body>
    <nav>
      <?php echo($menu); ?>
    </nav>

    <?php echo($contenu); ?>

    <footer>
      
    </footer>
  </body>
</html>
