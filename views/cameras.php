<html>

  <head>

  </head>

  <body>

    <header>
      <?php
      $titre = 'Nos produits';
      $menu = menu($_SESSION['type']);
      $contenu = 'Nos produits';
      $footer = footer();
      include('gabarit.php');
      $menu_products = menu_products('')
      ?>
    </header>

    <main>

      <ul>
        <li>
          <h2> CAMERA 1 </h2>
          <p> CAMERA 1 </p>
          <p><img src="ehome/views/ressources/images/maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>
        </li>

        <li>
          <h2> CAMERA 2 </h2>
          <p> CAMERA 2 </p>
          <p><img src="ehome/views/ressources/images/maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>
       </li>

        <li>
          <h2> CAMERA 3 </h2>
          <p> CAMERA 3 </p>
          <p><img src="ehome/views/ressources/images/maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>
        </li>

      </ul>

    </main>


    <footer>

    </footer>


  </body>

</html>
