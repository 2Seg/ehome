
<html>

  <head>

  </head>

  <body>

    <header>
      <?php
/*
vue gérant l'affichage de la page "Nos produits"
*/
      $titre = 'Nos produits';
      $menu = menu($_SESSION['type']);
      $contenu = 'Nos produits';
      include('gabarit.php');
      $menu_products = menu_products('')
      ?>
    </header>

    <main>

    </main>


    <footer>
      <?php
      $footer = footer();
      ?>
    </footer>


  </body>

</html>
