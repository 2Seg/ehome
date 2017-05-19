<?php
/*
vue répertoriant les fonctions gérant l'affichage des différentes parties des pages
*/


// fonction qui gère l'affichage du menu et qui redirige l'utilisateur à travers toutes les pages du site grâce aux 'cibles' dans les URL
function menu($type) {
  ob_start();
  ?>
    <ul class="menu">
      <li class="menu_elements"><a class="text_menu" href="index.php?cible=home"><img class="logo_menu" src="views/ressources/logos/logo1-200x40.png" alt="Logo eHome" title="ehome.com"></a></li>
      <li class="menu_elements"><a class="text_menu" href="index.php?cible=about-us">NOTRE ENTREPRISE</a></li>
      <li class="menu_elements"><a class="text_menu" href="index.php?cible=products">NOS PRODUITS</a></li>
    <?php
    if($type == 'user') {
      echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=disconnect">Se déconnecter</a></li>');
      echo ('<li class="menu_elements"><a class="text_menu" href="index.php?cible=profil"><img src="views/ressources/icons/man-13.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
    } elseif ($type == 'administrator') {
      echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=disconnect">Se déconnecter</a></li>');
      echo ('<li class="menu_elements"><a class="text_menu" href="index.php?cible=profil"><img src="views/ressources/icons/businessman.png" alt="avatar"></a></li>');
    } else {
      echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=join-us_1">NOUS REJOINDRE</a></li>');
      echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=signin">CONNEXION</a></li>');
    }
    ?>
    </ul>
    <?php
  $menu = ob_get_clean();
  return $menu;
}


// fonction qui gère l'affichage du menu classique + celui des produits
function menu2($type) {
  ob_start();
  ?>
    <ul class="menu">
      <li class="menu_elements"><a class="text_menu" href="index.php?cible=home"><img class="logo_menu" src="views/ressources/logos/logo1-200x40.png" alt="Logo eHome" title="ehome.com"></a></li>
      <li class="menu_elements"><a class="text_menu" href="index.php?cible=about-us">NOTRE ENTREPRISE</a></li>
      <li class="menu_elements"><a class="text_menu" href="index.php?cible=products">NOS PRODUITS</a></li>
    <?php
    if($type == 'user') {
      echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=disconnect">Se déconnecter</a></li>');
      echo ('<li class="menu_elements"><a class="text_menu" href="index.php?cible=signin"><img src="views/ressources/icons/man-13.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
    } elseif ($type == 'administrator') {
      echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=disconnect">Se déconnecter</a></li>');
      echo ('<li class="menu_elements"><a class="text_menu" href="index.php?cible=signin"><img src="views/ressources/icons/businessman.png" alt="avatar"></a></li>');
    } else {
      echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=join-us_1">NOUS REJOINDRE</a></li>');
      echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=signin">CONNEXION</a></li>');
    }
    ?>
    </ul>
    <ul class="menu_products">
      <li class="menu_products_elements"><a class="text_menu_products" href="index.php?cible=sensors"> Capteurs </a></li>
      <li class="menu_products_elements"><a class="text_menu_products" href="index.php?cible=actuators"> Actionneurs </a></li>
      <li class="menu_products_elements"><a class="text_menu_products" href="index.php?cible=cameras"> Caméras </a></li>
    </ul>
    <?php
  $menu = ob_get_clean();
  return $menu;
}


function footer() {

	?>
	<ul class="footer">

		<li class="footer_elements"> <em>Localisation</em> </li>

		<ul>
			<li class="footer_elements"> <p><img class="map" src="views\ressources\images\map_isep.png" alt="Map rue de Vanves"  title="Cliquez pour agrandir" /></p></li>
		</ul>

		<li class="footer_elements"> <em>Mentions légales</em> </li>
		<li class="footer_elements"> <em>Contact</em> </li>

		<ul>
			<li class="footer_elements"> +33 1 23 45 67 89 </li>
			<li class="footer_elements">  accueil@ehome.com </li>
		</ul>

	</ul>
	<?php
}



// fonction qui génère l'affichage du formulaire de connexion
// l'argument permet un affichage des messages d'erreur
function form_signin($erreur) {
  ob_start();
  ?>

  <form method="post" action="index.php?cible=connect">
    <fieldset>
      <legend>Connexion</legend>
      <?php
      if ($erreur != '') {
        echo ('<h2>Erreur dans le formulaire de connexion : '.$erreur.'</h2>');
      }
      ?>
      <p>
        <label for="login">Identifiant</label><br/>
        <input type="text" name="login" id="login" placeholder="Votre identifiant"/>
        <img src="views/ressources/icons/info.png" alt="icone information" title="Saisissez l'adresse e-mail de votre compte client ou votre identifiant.">
      </p>
      <p>
        <label for="password">Mot de passe</label><a href="">Mot de passe oublié ?</a><br/>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe"/>
        <img src="views/ressources/icons/info.png" alt="icone information" title="Saisissez le mot de passe associé à votre compte.">
      </p>
      <p>
        <input type="submit" value="Se connecter"/>
      </p>
    </fieldset>
  </form>
  <?php
  $formulaire = ob_get_clean();
  return $formulaire;
}


// fonction qui génère l'affichage du formulaire d'inscription en fonction du type de personne qui s'inscrit (admnistrateur ou utilisateur)
// génère par défaut l'affichage du formulaire utilisateur
// génère l'affichage du formulaire administrateur si on lui passe 'administrateur' en argument
function form_subscribe_user() {
  ob_start();
  ?>
  <form method="post" action="index.php?cible=subscribe">
    <fieldset>
      <legend>Informations de connexion</legend>
        <p>
          <label for="login">Identifiant</label><br/>
          <input type="text" name="login" id="login" placeholder="Identifiant de connexion" required/>
        </p>
        <p>
          <label for="password">Mot de passe</label><br/>
          <input type="password" name="password" id="password" placeholder="Mot de passe" required/>
        </p>
        <p>
          <label for="conf_password">Confirmez le mot de passe</label><br/>
          <input type="password" name="conf_password" id="conf_password" placeholder="Confirmation du mot de passe" required/>
        </p>
    </fieldset>

    <fieldset>
      <legend>Informations personnelles</legend>
        <p>
          Civilité<br/>
          <input type="radio" name="civilite" value="monsieur" id="monsieur"/>
          <label for="monsieur">Monsieur</label><br/>
          <input type="radio" name="civilite" value="madame" id="madame"/>
          <label for="madame">Madame</label>
        </p>
        <p>
          <label for="nom">Nom</label><br/>
          <input type="text" name="nom" id="nom" placeholder="Votre nom" required/>
        </p>
        <p>
          <label for="prenom">Prénom</label><br/>
          <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required/>
        </p>
        <p>
          <label for="date_naissance">Date de naissance</label><br/>
          <input type="date" name="date_naissance" id="date_naissance" placeholder="Votre date de naissance" required/>
        </p>
        <p>
          <label for="nationalite">Nationalité</label><br/>
          <input type="text" name="nationalite" id="nationalite" placeholder="Votre nationalité" />
        </p>
        <p>
          <label for="pays_user">Pays</label><br/>
          <select name="pays_user" id="pays_user" required>
            <option value="placeholder" selected>-- Sélectionnez un pays --</option>
            <optgroup label="Europe">
              <option value="allemagne">Allemagne</option>
              <option value="autriche">Autriche</option>
              <option value="belgique">Belgique</option>
              <option value="bulgarie">Bulgarie</option>
              <option value="chypre">Chypre</option>
              <option value="croatie">Croatie</option>
              <option value="danemark">Danemark</option>
              <option value="espagne">Espagne</option>
              <option value="estonie">Estonie</option>
              <option value="finlande">Finlande</option>
              <option value="france">France</option>
              <option value="grece">Grèce</option>
              <option value="hongrie">Hongrie</option>
              <option value="irlande">Irlande</option>
              <option value="italie">Italie</option>
              <option value="lettonie">Lettonie</option>
              <option value="lituanie">Lituanie</option>
              <option value="luxembourg">Luxembourg</option>
              <option value="malte">Malte</option>
              <option value="norvege">Norvège</option>
              <option value="paysBas">Pays-Bas</option>
              <option value="pologne">Pologne</option>
              <option value="portugal">Portugal</option>
              <option value="république_tchèque">République tchèque</option>
              <option value="roumanie">Roumanie</option>
              <option value="royaume_uni">Royaume-Uni</option>
              <option value="slovaquie">Slovaquie</option>
              <option value="slovenie">Slovénie</option>
              <option value="suede">Suède</option>
              <option value="suisse">Suisse</option>
            </optgroup>
          </select>
        </p>
        <p>
          <label for="telephone">Téléphone</label><br/>
          <input type="tel" name="telephone" id="telephone" maxlength="12" placeholder="Votre téléphone" required/>
        </p>
        <p>
          <label for="email">E-mail</label><br/>
          <input type="email" name="email" id="email" placeholder="Votre e-mail" required/>
        </p>
        <p>
          <label for="paiement">Option de paiement</label><br/>
          <select name="paiement" id="paiement" required>
            <option value="placeholder" selected>-- Choisissez un moyen de paiement --</option>
            <option value="prélèvement_mensuel">Prélèvement automatique mensuel</option>
            <option value="prélèvement_annuel">Prélèvement automatique annuel</option>
            <option value="chèque_mensuel">Chèque mensuel</option>
            <option value="chèque_annuel">Chèque annuel</option>
          </select>
        </p>
    </fieldset>

    <fieldset>
      <legend>Logement</legend>
        <p>
          <label for="adresse_logement">Adresse</label><br/>
          <input type="text" name="adresse_logement" id="adresse_logement" placeholder="Adresse du domicile" required/>
        </p>
        <p>
          <label for="code_postal_logement">Code postal</label><br/>
          <input type="text" name="code_postal_logement" id="code_postal_logement" placeholder="Code postal" required/>
        </p>
        <p>
          <label for="ville_logement">Ville</label><br/>
          <input type="text" name="ville_logement" id="ville_logement" placeholder="Ville" required/>
        </p>
        <p>
          <label for="pays_logement">Pays</label><br/>
          <select name="pays_logement" id="pays_logement" required>
            <option value="placeholder" selected>-- Sélectionnez un pays --</option>
            <optgroup label="Europe">
              <option value="allemagne">Allemagne</option>
              <option value="autriche">Autriche</option>
              <option value="belgique">Belgique</option>
              <option value="bulgarie">Bulgarie</option>
              <option value="chypre">Chypre</option>
              <option value="croatie">Croatie</option>
              <option value="danemark">Danemark</option>
              <option value="espagne">Espagne</option>
              <option value="estonie">Estonie</option>
              <option value="finlande">Finlande</option>
              <option value="france">France</option>
              <option value="grece">Grèce</option>
              <option value="hongrie">Hongrie</option>
              <option value="irlande">Irlande</option>
              <option value="italie">Italie</option>
              <option value="lettonie">Lettonie</option>
              <option value="lituanie">Lituanie</option>
              <option value="luxembourg">Luxembourg</option>
              <option value="malte">Malte</option>
              <option value="norvege">Norvège</option>
              <option value="paysBas">Pays-Bas</option>
              <option value="pologne">Pologne</option>
              <option value="portugal">Portugal</option>
              <option value="république_tchèque">République tchèque</option>
              <option value="roumanie">Roumanie</option>
              <option value="royaume_uni">Royaume-Uni</option>
              <option value="slovaquie">Slovaquie</option>
              <option value="slovenie">Slovénie</option>
              <option value="suede">Suède</option>
              <option value="suisse">Suisse</option>
            </optgroup>
          </select>
        </p>
        <p>
          <label for="nb_habitant">Nombre d'habitants</label><br/>
          <input type="number" name="nb_habitant" id="nb_habitant" placeholder="Nombre d'habitants" required/>
        </p>
        <p>
          <label for="nb_piece">Nombre de pièces</label><br/>
          <input type="number" name="nb_piece" id="nb_piece" placeholder="Nombre de pièces" min="1" required/>
        </p>
        <p>
          <label for="superficie">Superficie (m²)</label><br/>
          <input type="text" name="superficie" id="superficie" placeholder="Superficie (m²)" required/>
        </p>
    </fieldset>

    <p>
      <input type="reset" value="Rafraichir">
      <input type="submit" value="S'inscrire"/>
    </p>
  </form>
  <?php
  $formulaire = ob_get_clean();
  return $formulaire;
}

// fonction qui génère un formulaire en fonction du nb de pièces en entrée
function form_capteur_piece($nb_pièce) {
  ob_start();
  ?>
  <form method="post" action='index.php?cible=sensor_choice'>
    <fieldset>
      <legend>Choix des capteurs</legend>
      <table>
        <tr>
          <th>Pièce</th>
          <th>Capteur de luminosité</th>
          <th>Capteur de température</th>
          <th>Capteur d'humidité</th>
          <th>Détecteur de mouvement</th>
          <th>Détecteur de fumée</th>
          <th>Caméra</th>
          <th>Actionneur</th>
        </tr>
      <?php
      for($i = 1; $i <= $nb_pièce; $i++) {
      ?>
      <tr>
        <td>
          <input type="text" name="<?php echo('piece_'.$i); ?>" size="10" placeholder="<?php echo('Pièce '.$i); ?>" required/>
        </td>
        <td>
          <input type="number" name="<?php echo('luminosite_'.$i); ?>" min="0" placeholder="Nombre" required/>
        </td>
        <td>
          <input type="number" name="<?php echo('temperature_'.$i); ?>" min="0" placeholder="Nombre" required/>
        </td>
        <td>
          <input type="number" name="<?php echo('humidite_'.$i); ?>" min="0" placeholder="Nombre" required/>
        </td>
        <td>
          <input type="number" name="<?php echo('mouvement_'.$i); ?>" min="0" placeholder="Nombre" required/>
        </td>
        <td>
          <input type="number" name="<?php echo('fumee_'.$i); ?>" min="0" placeholder="Nombre" required/>
        </td>
        <td>
          <input type="number" name="<?php echo('camera_'.$i); ?>" min="0" placeholder="Nombre" required/>
        </td>
        <td>
          <input type="number" name="<?php echo('actionneur_'.$i); ?>" min="0" placeholder="Nombre" required/>
        </td>
      </tr>

      <?php
      }
      ?>
      </table>
      <input type="reset" value="Rafraichir">
      <input type="submit" value="Envoyer" />
  </form>

  <form method="post" action="index.php?cible=join-us_success">
    <input type="submit" value="Continuer sans sauvegarder" />
    </fieldset>
  </form>

  <?php
  $formulaire = ob_get_clean();
  return $formulaire;
}
