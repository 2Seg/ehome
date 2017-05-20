<?php
/*
vue répertoriant les fonctions gérant l'affichage des différentes parties des pages
*/


// fonction qui gère l'affichage du menu et qui redirige l'utilisateur à travers toutes les pages du site grâce aux 'cibles' dans les URL
function menu() {
  ob_start();
  ?>
    <ul class="menu">
      <li class="menu_elements"><a class="text_menu" href="index.php?cible=home"><img class="logo_menu" src="views/ressources/logos/logo1-200x40.png" alt="Logo eHome" title="ehome.com"></a></li>
      <li class="menu_elements"><a class="text_menu" href="index.php?cible=about-us">NOTRE ENTREPRISE</a></li>
      <li class="menu_elements"><a class="text_menu" href="index.php?cible=products">NOS PRODUITS</a></li>
    <?php
    if (isset($_SESSION['type'])) {
      if($_SESSION['type'] == 'user') {
        echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=disconnect">SE DECONNECTER</a></li>');
        if($_SESSION['civilite'] == 'madame') {
          echo ('<li class="menu_elements"><a class="text_menu" href="index.php?cible=profil"><img src="views/ressources/icons/w_default_user.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
        } else {
          echo ('<li class="menu_elements"><a class="text_menu" href="index.php?cible=profil"><img src="views/ressources/icons/m_default_user.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
        }
      } elseif ($_SESSION['type'] == 'admin') {
        echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=disconnect">SE DECONNECTER</a></li>');
        if($_SESSION['civilite'] == 'madame') {
          echo ('<li class="menu_elements"><a class="text_menu" href="index.php?cible=profil"><img src="views/ressources/icons/w_default_admin.png" alt="avatar"></a></li>');
        } else {
          echo ('<li class="menu_elements"><a class="text_menu" href="index.php?cible=profil"><img src="views/ressources/icons/m_default_admin.png" alt="avatar"></a></li>');
        }
      } else {
        echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=join-us">NOUS REJOINDRE</a></li>');
        echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=signin">CONNEXION</a></li>');
      }
    } else {
      echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=join-us">NOUS REJOINDRE</a></li>');
      echo('<li class="menu_elements"><a class="text_menu" href="index.php?cible=signin">CONNEXION</a></li>');
    }
    ?>
    </ul>
    <?php
  $menu = ob_get_clean();
  return $menu;
}


// fonction qui gère l'affichage du menu classique + celui des produits
function menu_products() {
  ob_start();
  ?>
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
  ob_start();
	?>
	<ul class="footer">

		<li class="footer_elements"> <em>Localisation</em> </li>

		<ul>
			<li class="footer_elements"> <p><a href="https://www.google.fr/maps/place/ISEP/@48.8243885,2.2765791,16.25z/data=!4m5!3m4!1s0x47e670797ea4730d:0xe0d3eb2ad501cb27!8m2!3d48.824529!4d2.2798536"><img class="map" src="views\ressources\images\map_isep.png" alt="Map rue de Vanves"  title="Cliquez ici pour afficher dans Google Maps" /></a></p></li>
		</ul>

		<li class="footer_elements"> <em>Mentions légales</em> </li>
		<li class="footer_elements"> <em>Contact</em> </li>

		<ul>
			<li class="footer_elements"> +33 1 23 45 67 89 </li>
			<li class="footer_elements">  accueil@ehome.com </li>
		</ul>

	</ul>
	<?php
  $footer = ob_get_clean();
  return $footer;
}

function content_products() {
  ob_start();
  ?>
  <p> Voici la page principale "Produits" </p>

  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_actuators() {
  ob_start();
  ?>
  <p>Voici la page principale "Actionneurs" </p>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}


function content_cameras() {
  ob_start();
  ?>
  <p>Voici la page principale "Caméras" </p>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}


function content_sensors() {
  ob_start();
  ?>
  <p>Voici la page principale "Capteurs" </p>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}


function content_about_us() {
  ob_start();
  ?>
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
      <li> Prix de l\'innovation 2016 </li>
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

    <p><img src="views\ressources\images\maison_entreprise.jpeg" alt="Maison Entreprise"  title="Cliquez pour agrandir" /></p>
  </main>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}


// fonction qui génère l'affichage du formulaire de connexion
// l'argument permet un affichage des messages d'erreur
function form_signin($erreur) {
  ob_start();
  ?>

  <form method="post" action="index.php?cible=connect">
    <section>
    <article>
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
        <img src="views/ressources/icons/info.png" alt="icone information" title="Saisissez votre identifiant client.">
      </p>
      <p>
        <label for="password">Mot de passe</label><br/>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe"/>
        <img src="views/ressources/icons/info.png" alt="icone information" title="Saisissez le mot de passe associé à votre compte.">
      </p>
      <p class="bouton_connexion">
        <input type="submit" value="Se connecter"/>
      </p>
      <p>Pas encore inscrit ? Rejoignez-nous en cliquant <a class="lien" href="index.php?cible=join-us">ici</a>.</p>
    </fieldset>
    </article>
  </section>
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
    <section>
    <article>
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
    </article>

    <article>
    <fieldset>
      <legend>Informations personnelles</legend>
        <p>
          <label for="civilité"> Civilité <br/>
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
    </article>

    <article>
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
    </article>

    <p class="bouton">
      <input type="reset" value="Rafraichir">
      <input type="submit" value="S'inscrire"/>
    </p>
  </form>

  <?php
  $formulaire = ob_get_clean();
  return $formulaire;
}

// fonction qui génère un formulaire en fonction du nb de pièces en entrée
function form_sensor_room() {
  ob_start();
  ?>
  <form method="post" action='index.php?cible=control_sensor_add'>
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
      for($i = 1; $i <= $_SESSION['nb_piece']; $i++) {
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
  </fieldset>


  <?php
  $formulaire = ob_get_clean();
  return $formulaire;
}

// fonction affichant le menu utilisateur (une fois qu'il est connecté)
function menu_user($type) {
  ob_start();
  if($type == 'user') {?>
    <ul class="menu_products">
      <li class="menu_products_elements"><a href="index.php?cible=home_user" class="text_menu_products">Mon domicile</a></li>
      <li class="menu_products_elements"><a href="index.php?cible=home_management" class="text_menu_products">Gestion du domicile</a></li>
      <li class="menu_products_elements"><a href="index.php?cible=notif_user" class="text_menu_products">Notifications</a></li>
      <li class="menu_products_elements"><a href="index.php?cible=info_user" class="text_menu_products">Mes informations</a></li>
      <li class="menu_products_elements"><a href="index.php?cible=subcription_user" class="text_menu_products">Mon abonnement</a></li>
      <li class="menu_products_elements"><a href="index.php?cible=messaging_user" class="text_menu_products">Messagerie</a></li>
    </ul>
  <?php
  } elseif ($type == 'admin') {?>
    <ul>
      <li class="menu_products_elements"><a href="index.php?cible=overview" class="text_menu_products">Vue d'ensemble</a></li>
      <li class="menu_products_elements"><a href="index.php?cible=user_management" class="text_menu_products">Gestion des utilisateurs</a></li>
      <li class="menu_products_elements"><a href="index.php?cible=notification" class="text_menu_products">Notifications</a></li>
      <li class="menu_products_elements"><a href="index.php?cible=security" class="text_menu_products">Sécurité</a></li>
      <li class="menu_products_elements"><a href="index.php?cible=messaging" class="text_menu_products">Messagerie</a></li>
    </ul>
  <?php
  }
  $menu = ob_get_clean();
  return $menu;
}

// fonction qui récupère la date du jour
function current_date() {
  $now = getdate();
  $day = '';
  $month = '';
  if ($now['weekday'] == 'Monday') {
    $day = 'Lundi';
  } else if ($now['weekday'] == 'Tuesday') {
    $day = 'Mardi';
  } else if ($now['weekday'] == 'Wednesday') {
    $day = 'Mercredi';
  } else if ($now['weekday'] == 'Thursday') {
    $day = 'Jeudi';
  } else if ($now['weekday'] == 'Friday') {
    $day = 'Vendredi';
  } else if ($now['weekday'] == 'Saturday') {
    $day = 'Samedi';
  } else {
    $day = 'Dimanche';
  }

  if ($now['month'] == 'January') {
    $month = 'janvier';
  } elseif ($now['month'] == 'February') {
    $month = 'février';
  } elseif ($now['month'] == 'March') {
    $month = 'mars';
  } elseif ($now['month'] == 'April') {
    $month = 'avril';
  } elseif ($now['month'] == 'May') {
    $month = 'mai';
  } elseif ($now['month'] == 'June') {
    $month = 'juin';
  } elseif ($now['month'] == 'July') {
    $month = 'juillet';
  } elseif ($now['month'] == 'August') {
    $month = 'août';
  } elseif ($now['month'] == 'September') {
    $month = 'septembre';
  } elseif ($now['month'] == 'October') {
    $month = 'octobre';
  } elseif ($now['month'] == 'November') {
    $month = 'novembre';
  } else {
    $month = 'décembre';
  }

  $date = ''.$day.' '.$now['mday'].' '.$month.'';
  return $date;
}

// fonction responsable de l'affichage du bloc "Mon domicile"
function my_home() {
  ob_start();
  ?>
  <section>
  <article>
    <h3>Mon domicile</h3>
    <p><strong><?php echo(current_date()); ?></strong></p>

    <h2>Aucune notification</h2>
  </article>
  </section>

  <?php
  $home = ob_get_clean();
  return $home;
}

// fonction gérant l'affichage des informations générales de l'utilisateur
function my_basic_information() {
  ob_start();
  ?>

  <section>
  <article>
    <h3>Mes informations client</h3>
    <p><strong>Civilité : </strong><?php echo($_SESSION['civilite']); ?></p>
    <p><strong>Nom : </strong><?php echo($_SESSION['nom']); ?></p>
    <p><strong>Prénom : </strong><?php echo($_SESSION['prenom']); ?></p>
    <p><strong>Adresse : </strong><?php echo($_SESSION['adresse']); ?></p>
    <p><strong>Code postal : </strong><?php echo($_SESSION['code_postal']); ?></p>
    <p><strong>Ville : </strong><?php echo($_SESSION['ville']); ?></p>
    <p><strong>Pays : </strong><?php echo($_SESSION['pays']); ?></p>

    <form method="post" action="index.php?cible=info_user">
      <input type="submit" value="Voir les informations complètes">
    </form>
  </article>
  </section>

  <?php
  $info = ob_get_clean();
  return $info;
}


// fonction gérant l'affichage des informations sur le domicile utilisateur
function my_home_information() {
  ob_start();
  ?>
  <article>
    <h3>Informations du logement</h3>
    <p><strong>Adresse : </strong><?php echo($_SESSION['adresse']); ?></p>
    <p><strong>Code postal : </strong><?php echo($_SESSION['code_postal']); ?></p>
    <p><strong>Ville : </strong><?php echo($_SESSION['ville']); ?></p>
    <p><strong>Pays : </strong><?php echo($_SESSION['pays']); ?></p>
    <p><strong>Nombre d'habitant : </strong><?php echo($_SESSION['nb_habitant']); ?></p>
    <p><strong>Nombre de pièce : </strong><?php echo($_SESSION['nb_piece']); ?></p>
    <p><strong>Superficie : </strong><?php echo($_SESSION['superficie']); ?></p>

    <form method="post" action="index.php?cible=edit_info_home">
      <input type="submit" value="Modifier les informations">
    </form>
  </article>


function content_products() {
  ob_start();
  ?>
  <section>
  <article>
  <p> <strong class="ehome">eHome</strong> met à votre disposition une large gamme d’équipements très divers vous permettant
    d’enregistrer certaines valeurs afin d’adapter vos besoins par la suite en vous connectant à votre
    compte personnel sur le site internet www.ehome.fr.
    Quel est l’intérêt de tels dispositifs ?
    L’habitation connectée offre à ses résidants un confort de haut niveau qui simplifie le quotidien de
    chacun d’entre eux.</p>

  <ul>Elle permet d’accommoder les nécessités individuelles :
    <li class = "element_products"> Vous n’êtes pas souvent chez vous et voulez garder un oeil sur votre maison </li>
    <li class = "element_products"> Vous êtes une personne à mobilité réduite </li>
    <li class = "element_products"> Vous voulez simplement un système regroupant tous vos équipements électroniques afin de bénéficier d’un gain de temps et d’argent l’habitation connectée est faite pour vous. </li>
  </ul>
  <ul>Vous trouverez ici notre catalogue d’équipements domotiques, classés par type :
    <li class = "element_products"> Capteurs : de luminosité, de température, de mouvement.</li>
    <li class = "element_products"> Actionneurs : volets, portail, garage.</li>
    <li class = "element_products"> Caméras : pour la surveillance</li>
  </ul>

  <p> Si vous ne trouvez pas le produit recherché ou si vous avez des questions, vous pouvez nous
    contacter à l’adresse mail suivante : <a class="lien"> serviceclient@ehome.fr </a> ou par téléphone au <a class="lien"> 06.06.06.06.06 </a> </p>

  </article>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}


function content_actuators() {
  ob_start();
  ?>
  <section>
  <article>
  <p>Voici la page principale "Actionneurs" </p>
  </article>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}


function content_cameras() {
  ob_start();
  ?>
  <section>
  <article>
  <p>Voici la page principale "Caméras" </p>
  </article>
  </section>

  <?php
  $home = ob_get_clean();
  return $home;
}

// fonction gérant l'affichage des informations sur les capteurs présents dans les pièces d'un logement
function my_sensor_room() {
  ob_start();
  ?>

  <article>
  <h3>Dispositifs et pièces du domicile</h3>
  <?php
  if ($_SESSION['data_room'] == 'false') {
    ?>
    <h2>Veuillez ajouter des pièces pour permettre l'affichage des données</h2>
    <form method="post" action="index.php?cible=sensor_add">
      <input type="submit" value="Ajouter">
    </form>
    <?php
  } else {
    ?>
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
      for($i = 1; $i <= $_SESSION['nb_piece']; $i++) {
      ?>
      <tr>
        <td>
          <?php echo($_SESSION['piece_'.$i]); ?>
        </td>
        <td>
          <?php echo($_SESSION['luminosite_'.$i]); ?>
        </td>
        <td>
          <?php echo($_SESSION['temperature_'.$i]); ?>
        </td>
        <td>
          <?php echo($_SESSION['humidite_'.$i]); ?>
        </td>
        <td>
          <?php echo($_SESSION['mouvement_'.$i]); ?>
        </td>
        <td>
          <?php echo($_SESSION['fumee_'.$i]); ?>
        </td>
        <td>
          <?php echo($_SESSION['camera_'.$i]); ?>
        </td>
        <td>
          <?php echo($_SESSION['actionneur_'.$i]); ?>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
  <form method="post" action="index.php?cible=add_sensor">
    <input type="submit" value="Ajouter">
  </form>
  <form method="post" action="index.php?cible=edit_sensor">
    <input type="submit" value="Modifier">
  </form>
  <form method="post" action="index.php?cible=delete_sensor">
    <input type="submit" value="Supprimer">
  </form>
  </article>
  <section>
  <article>
  <p>Voici la page principale "Capteurs" </p>
  </article>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}


function content_about_us() {
  ob_start();
  ?>
  <main class="main_about_us">
    <section>

    <article>
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
    </article>

    <article>
    <ul class = "content_about_us">
      <li class = "element_about_us"> Créée en 2016 </li>
      <li class = "element_about_us"> 92% de satisfaction</li>
      <li class = "element_about_us"> Prix de l'innovation 2016 </li>
    </ul>
    </article>

    <article>
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
    </article>

  </section>
  </main>
  <?php
  }
  $sensor = ob_get_clean();
  return $sensor;
  }
