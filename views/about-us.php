<html>

  <head>

  </head>

  <body>

    <header>
      <?php
      $titre = 'Notre entreprise';
      $menu = menu($_SESSION['type']);
      $contenu = 'Notre entreprise';
      include('gabarit.php');
      ?>
    </header>

    <main>
      <h1> <strong> Notre entreprise </strong> </h1>

      <h2> Notre histoire </h2>

      <p> Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma,
          ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi,
          humanitatis multiformibus officiis retentabant. Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma,
            ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi,
            humanitatis multiformibus officiis retentabant.</p>

      <p> Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma,
          ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi,
          humanitatis multiformibus officiis retentabant.Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma,
          ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi,
          humanitatis multiformibus officiis retentabant.</p>

      <ul>
        <li> Créée en 2016 </li>
        <li> 92% de satisfaction</li>
        <li> Prix de l'innovation 2016 </li>
      </ul>

      <h2> Nos objectifs </h2>

      <p> Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma,
          ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi,
          humanitatis multiformibus officiis retentabant.Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma,
            ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi,
            humanitatis multiformibus officiis retentabant.</p>

      <p> Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma,
          ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi,
          humanitatis multiformibus officiis retentabant.Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma,
            ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi,
            humanitatis multiformibus officiis retentabant.</p>

    </main>

    <p><img src="ehome/views/ressources/images/maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>

    <footer>
      <?php
      $footer = footer();
      ?>
    </footer>


  </body>

</html>
