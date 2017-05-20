<?php
/*
Page Capteurs de Nos Produits
*/
$titre = 'Nos capteurs';

$menu = menu();
if (isset($_SESSION['type'])) {
  $menu .= menu_user($_SESSION['type']);
}
$menu .= menu2();

// début du contenu...
$contenu = 'Voici la page "Capteurs"';
$contenu .= '<html>

  <head>

  </head>

  <body>

    <main>

      <ul>
        <li>
          <h2> Capteurs de luminosité </h2>
          <p> LUMINOSITE </p>
          <p><img src="ehome/views/ressources/images/maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>
        </li>

        <li>
          <h2> Capteurs de température </h2>
          <p> TEMPERATURE </p>
          <p><img src="ehome/views/ressources/images/maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>
       </li>

        <li>
          <h2> Capteurs d\'humidité </h2>
          <p> HUMIDITE </p>
          <p><img src="ehome/views/ressources/images/maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>
        </li>

      </ul>

    </main>


    <footer>

    </footer>


  </body>

</html>';
// fin du contenu

$footer = footer();
include('gabarit.php');

?>
