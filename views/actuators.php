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
          <h2> VOLET </h2>
          <p> LUMINOSITE </p>
          <p><img src="ehome/views/ressources/images/maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>
        </li>

        <li>
          <h2> moteur </h2>
          <p> TEMPERATURE </p>
          <p><img src="ehome/views/ressources/images/maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>
       </li>

        <li>
          <h2> fenetre </h2>
          <p> HUMIDITE </p>
          <p><img src="ehome/views/ressources/images/maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>
        </li>

      </ul>

    </main>


    <footer>

    </footer>


  </body>

</html>
