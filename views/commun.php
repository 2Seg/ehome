<?php
/*
vue répertoriant les fonctions gérant l'affichage des différentes parties des pages
*/

/*****************************************************************Fonctions utilitaires***********************************************************************/

function strtolower_utf8($string){
  $convert_to = array(
    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u",
    "v", "w", "x", "y", "z", "à", "á", "â", "ã", "ä", "å", "æ", "ç", "è", "é", "ê", "ë", "ì", "í", "î", "ï",
    "ð", "ñ", "ò", "ó", "ô", "õ", "ö", "ø", "ù", "ú", "û", "ü", "ý", "а", "б", "в", "г", "д", "е", "ё", "ж",
    "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы",
    "ь", "э", "ю", "я"
  );
  $convert_from = array(
    "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U",
    "V", "W", "X", "Y", "Z", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï",
    "Ð", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж",
    "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ъ",
    "Ь", "Э", "Ю", "Я"
  );

  return str_replace($convert_from, $convert_to, $string);
}

// fonction qui met seulement la 1ère lettre d'une string en majuscules
function maj_lettre1($str) {
  $str1 = strtolower_utf8($str);
  $str2 = ucfirst($str1);
  return $str2;
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
  $date = array($day, $now['mday'], $month, $now['year']);
  return $date;
}

/*****************************************************************Fonctions $menu***********************************************************************/

// fonction qui gère l'affichage du menu et qui redirige l'utilisateur à travers toutes les pages du site grâce aux 'cibles' dans les URL
function menu() {
  ob_start();
  ?>
    <ul class="menu">
      <li class="li_logo_menu"><a href="index.php?cible=home"><img class="logo_menu" src="views/styles/ressources/logos/logo1-200x40.png" alt="Logo eHome" title="ehome.com"></a></li>
      <li class="menu_elements" id="about-us"><a class="text_menu" href="index.php?cible=about-us">NOTRE ENTREPRISE</a></li>
      <li class="menu_elements" id="products"><a class="text_menu" href="index.php?cible=products">NOS PRODUITS</a></li>
    <?php
    if (isset($_SESSION['type'])) {
      if($_SESSION['type'] == 'user') {
        echo('<li class="menu_elements" id="disconnect"><a class="text_menu" href="index.php?cible=disconnect">SE DECONNECTER</a></li>');
        if($_SESSION['civilite'] == 'Madame') {
          echo ('<li class="menu_profil"><a class="text_menu" href="index.php?cible=info_user"><img src="views/styles/ressources/icons/w_default_user.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
        } else {
          echo ('<li class="menu_profil"><a class="text_menu" href="index.php?cible=info_user"><img src="views/styles/ressources/icons/m_default_user.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
        }
      } elseif ($_SESSION['type'] == 'admin') {
        echo('<li class="menu_elements" id="disconnect"><a class="text_menu" href="index.php?cible=disconnect">SE DECONNECTER</a></li>');
        if($_SESSION['civilite'] == 'Madame') {
          echo ('<li class="menu_profil"><a class="text_menu" href="index.php?cible=info_admin"><img src="views/styles/ressources/icons/w_default_admin.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
        } else {
          echo ('<li class="menu_profil"><a class="text_menu" href="index.php?cible=info_admin"><img src="views/styles/ressources/icons/m_default_admin.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
        }
      } else {
        echo('<li class="menu_elements" id="join-us"><a class="text_menu" href="index.php?cible=join-us_type">NOUS REJOINDRE</a></li>');
        echo('<li class="menu_elements" id="connect"><a class="text_menu" href="index.php?cible=signin">CONNEXION</a></li>');
      }
    } else {
      echo('<li class="menu_elements" id="join-us"><a class="text_menu" href="index.php?cible=join-us_type">NOUS REJOINDRE</a></li>');
      echo('<li class="menu_elements" id="connect"><a class="text_menu" href="index.php?cible=signin">CONNEXION</a></li>');
    }
    ?>
    </ul>
    <?php
  $menu = ob_get_clean();
  return $menu;
}

function menu_home() {
  ob_start();
  ?>
  <div class="conteneur_menu_home">
    <ul class="menu_home">
      <li class="li_logo_menu"><a  href="index.php?cible=home"><img class="logo_menu" src="views/styles/ressources/logos/logo1-200x40.png" alt="Logo eHome" title="ehome.com"></a></li>
      <li class="menu_elements2"><a class="text_menu" href="index.php?cible=about-us">NOTRE ENTREPRISE</a></li>
      <li class="menu_elements2"><a class="text_menu" href="index.php?cible=products">NOS PRODUITS</a></li>
    <?php
    if (isset($_SESSION['type'])) {
      if($_SESSION['type'] == 'user') {
        echo('<li class="menu_elements2"><a class="text_menu" href="index.php?cible=disconnect">SE DECONNECTER</a></li>');
        if($_SESSION['civilite'] == 'madame') {
          echo ('<li class="menu_profil"><a class="text_menu" href="index.php?cible=info_user"><img src="views/styles/ressources/icons/w_default_user.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
        } else {
          echo ('<li class="menu_profil"><a class="text_menu" href="index.php?cible=info_user"><img src="views/styles/ressources/icons/m_default_user.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
        }
      } elseif ($_SESSION['type'] == 'admin') {
        echo('<li class="menu_elements2"><a class="text_menu" href="index.php?cible=disconnect">SE DECONNECTER</a></li>');
        if($_SESSION['civilite'] == 'madame') {
          echo ('<li class="menu_profil"><a class="text_menu" href="index.php?cible=info_admin"><img src="views/styles/ressources/icons/w_default_admin.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
        } else {
          echo ('<li class="menu_profil"><a class="text_menu" href="index.php?cible=info_admin"><img src="views/styles/ressources/icons/m_default_admin.png" alt="avatar" title='.$_SESSION['identifiant'].'></a></li>');
        }
      } else {
        echo('<li class="menu_elements2"><a class="text_menu" href="index.php?cible=join-us_type">NOUS REJOINDRE</a></li>');
        echo('<li class="menu_elements2"><a class="text_menu" href="index.php?cible=signin">CONNEXION</a></li>');
      }
    } else {
      echo('<li class="menu_elements2"><a class="text_menu" href="index.php?cible=join-us_type">NOUS REJOINDRE</a></li>');
      echo('<li class="menu_elements2"><a class="text_menu" href="index.php?cible=signin">CONNEXION</a></li>');
    }
    ?>
    </ul>
  </div>
    <?php
  $menu = ob_get_clean();
  return $menu;
}

// fonction qui gère l'affichage du menu classique + celui des produits
function menu_products() {
  ob_start();
  ?>
    <ul class="menu_products">
      <li class="menu_products_elements" id="sensors"><a class="text_menu_products" href="index.php?cible=sensors">Capteurs</a></li>
      <div class="trait"></div>
      <li class="menu_products_elements" id="actuators"><a class="text_menu_products" href="index.php?cible=actuators">Actionneurs</a></li>
      <div class="trait"></div>
      <li class="menu_products_elements" id="cameras"><a class="text_menu_products" href="index.php?cible=cameras">Caméras</a></li>
    </ul>
    <?php
  $menu = ob_get_clean();
  return $menu;
}

// fonction affichant le menu utilisateur (une fois qu'il est connecté)
function menu_user($type) {
  ob_start();
  if($type == 'user') {?>
    <ul class="menu_user">
      <li class="menu_user_elements" id="home_user"><a href="index.php?cible=home_user" class="text_menu_user">Mon domicile</a></li>
      <li class="menu_user_elements" id="home_management"><a href="index.php?cible=home_management" class="text_menu_user">Gestion du domicile</a></li>
      <li class="menu_user_elements" id="info_user"><a href="index.php?cible=info_user" class="text_menu_user">Mes informations</a></li>
      <li class="menu_user_elements" id="notif_user"><a href="index.php?cible=notif_user" class="text_menu_user">Notifications</a></li>
      <li class="menu_user_elements" id="messaging_user"><a href="index.php?cible=messaging" class="text_menu_user">Messagerie</a></li>
    </ul>
  <?php
  } elseif ($type == 'admin') {?>
    <ul class="menu_user">
      <li class="menu_user_elements" id="home_admin"><a href="index.php?cible=home_admin" class="text_menu_user">Vue d'ensemble</a></li>
      <li class="menu_user_elements" id="user_management"><a href="index.php?cible=user_management" class="text_menu_user">Gestion des utilisateurs</a></li>
      <li class="menu_user_elements" id="info_admin"><a href="index.php?cible=info_admin" class="text_menu_user">Mes informations</a></li>
      <li class="menu_user_elements" id="notif_admin"><a href="index.php?cible=notif_admin" class="text_menu_user">Notifications</a></li>
      <li class="menu_user_elements" id="security"><a href="index.php?cible=security" class="text_menu_user">Sécurité</a></li>
      <li class="menu_user_elements" id="messaging_admin"><a href="index.php?cible=messaging" class="text_menu_user">Messagerie</a></li>
    </ul>
  <?php
  }
  $menu = ob_get_clean();
  return $menu;
}

/*****************************************************************Fonctions $contenu***********************************************************************/

// fonction permettant de choisir le type d'utilisateur
function content_type_user() {
  ob_start();
  ?>
  <section class="ju_section">
    <fieldset>
      <legend><h2 class="except_h2">Vous êtes :</h2></legend>
      <p><a href="index.php?cible=join-us_user"><button class="ju_button">Utilisateur</button></a></p>
      <p><a href="index.php?cible=join-us_admin"><button class="ju_button">Administrateur</button></a></p>
    </fieldset>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_home_admin() {
  ob_start();
  ?>
  <div class="flex2">
    <section class="box">
        <h3>Gestion des utilisateurs</h3>
        <p><a href="index.php?cible=user_management"><button>Gestion des utilisateurs</button></a></p>
    </section>

    <section class="box">
        <h3>Notifications</h3>
        <p><a href="index.php?cible=notif_admin"><button>Notifications</button></a></p>
    </section>
  </div>


  <div class="flex3">
    <section class="box">
        <h3>Sécurité</h3>
        <p><a href="index.php?cible=security"><button>Sécurité</button></a></p>
    </section>

    <section class="box">
        <h3>Messagerie</h3>
        <p><a href="index.php?cible=messaging"><button>Messagerie</button></a></p>
    </section>
  </div>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_notif_user() {
  ob_start();
  ?>
  <section class="notif_user">
      <h3>Mes notifications</h3>
      <p>Aucunes nouvelles notifications disponibles.</p>
  </section>
  <section class="button_edit">
      <a href="index.php?cible=home_user"><button>Retourner sur la page d'accueil utilisateur</button></a>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_notif_admin() {
  ob_start();
  ?>
  <section class="notif_admin">
      <h3>Mes notifications administrateur</h3>
      <p>Aucunes nouvelles notifications disponibles.</p>
  </section>
  <section class="button_edit">
      <a href="index.php?cible=home_admin"><button>Retourner sur la page d'accueil administrateur</button></a>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_security() {
  ob_start();
  ?>
  <section class="security">
      <h3>Poste de sécurité</h3>
      <p>Aucunes alertes de sécurité pour le moment.</p>
  </section>
  <section class="button_edit">
      <a href="index.php?cible=home_admin"><button>Retourner sur la page d'accueil administrateur</button></a>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function list_users($list_users) { // nouvelle version
  ob_start();
  ?>
  <section class="list_users">

    <h3>Liste des utilisateurs enregistrés</h3>
  <?php
  if ($list_users == array()) {
    echo('<h2 class="except_h2">Aucun utilisateur enregistré</h2>');
  } else {
  ?>
    <table>
     <tr>
         <th><strong>Civilité : </strong></th>
         <th><strong>Nom : </strong></th>
         <th><strong>Prénom : </strong></th>
         <th><strong>Id : </strong></th>
         <!-- <th><strong>Gestion de l'utilisateur : </strong></th> -->
     </tr>
    <?php
    for ($i = 0; $i < count($list_users); $i++) {
      ?>
      <tr>
          <td><?php echo($list_users[$i][0]); ?></td>
          <td><?php echo($list_users[$i][1]); ?></td>
          <td><?php echo($list_users[$i][2]); ?></td>
          <td><?php echo($list_users[$i][3]); ?></td>
          <td><a href="index.php?cible=gestion_user&amp;id=<?php echo($list_users[$i][3]) ?>"><button>Gestion de l'utilisateur</button></a></td>
      </tr>
      <?php
    }
    ?>
    </table>
  <?php
  }
  ?>

  </section>
  <section class="button_edit">
      <a href="index.php?cible=home_admin"><button>Retourner sur la page d'accueil administrateur</button></a>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_products() {
  ob_start();
  ?>
  <section>

    <h2>Nos produits</h2>
    <article>
    <p> <strong class="text_ehome">eHome</strong> met à votre disposition une large gamme d’équipements très divers vous permettant
      d’enregistrer certaines valeurs afin d’adapter vos besoins par la suite en vous connectant à votre
      compte personnel sur le site internet www.ehome.fr.
      Quel est l’intérêt de tels dispositifs ?
      L’habitation connectée offre à ses résidants un confort de haut niveau qui simplifie le quotidien de
      chacun d’entre eux.</p>
      Elle permet d’accommoder les nécessités individuelles :
    <ul>
      <li> Vous n’êtes pas souvent chez vous et voulez garder un oeil sur votre maison </li>
      <li> Vous êtes une personne à mobilité réduite </li>
      <li> Vous voulez simplement un système regroupant tous vos équipements électroniques afin de bénéficier d’un gain de temps et d’argent l’habitation connectée est faite pour vous. </li>
    </ul>
    Vous trouverez ici notre catalogue d’équipements domotiques, classés par type :
    <ul>
      <li> Capteurs : de luminosité, de température, de mouvement.</li>
      <li> Actionneurs : volets, portail, garage.</li>
      <li> Caméras : pour la surveillance</li>
    </ul>
    <p> Si vous ne trouvez pas le produit recherché ou si vous avez des questions, vous pouvez nous
      contacter à l’adresse mail suivante : <a class="lien"> serviceclient@ehome.fr </a> ou par téléphone au <a class="lien"> +33 1 23 45 67 89 </a> </p>
    </article>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_p() {
  ob_start();
	?>
  <aside>
	<ul class="content_p">
    <h3 class="content_p_text"> eHome c'est faire un choix de ... </h3>
    <div class="flexbox_p">
      <li class="flex_content_p"><h4>Sécurité</h4><p class="text_p">Protection de vos bien ainsi que de vos données personelles</p></li>
      <div class="trait_p"></div>
      <li class="flex_content_p"><h4>Fiabilité</h4><p class="text_p">Dispositif autonome, réactif et fonctionnel</p></li>
      <div class="trait_p"></div>
      <li class="flex_content_p"><h4>Flexibilité</h4><p class="text_p">Système adaptable à tout type d'habitation et entièrement modulable</p></p></li>
      <div class="trait_p"></div>
      <li class="flex_content_p"><h4>Contrôle total</h4><p class="text_p">Supervision via l'espace utilisateur</p></li>
    </div>
	</ul>
  </aside>
	<?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_c() {
  ob_start();
	?>
  <aside>
    <div class="flexbox_c">
      <section class="section_c"><section class="section2_c"><p class="text_c"><font size="7px">100%</font> <br>de satisfaction client</p></section></section>
      <section class="section2small_c"></section>
      <section class="section2small_c"></section>
        <section class="section_c"><section class="section2_c"><p class="text_c"><font size="7px">20</font> <br> ans d'expérience</p></section></section>
      <section class="section2small_c"></section>
      <section class="section2small_c"></section>
        <section class="section_c"><section class="section2_c"><p class="text_c"><font size="7px">1</font> <br>  seul dispositif pour toute votre maison</p></section></section>
      <section class="section2small_c"></section>
      <section class="section2small_c"></section>
        <section class="section_c"><section class="section2_c"><p class="text_c"><font size="7px">1243</font> <br>domiciles équipés par notre technologie</p></section></section>
    </div>
  </aside>
	<?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_sensors() {
  ob_start();
  ?>
  <section>
    <h2>Nos capteurs</h2>
    <article>
      <div class="flex_products">
        <div class="flex_products2">
          <h2>Capteur de luminosité</h2>
          <p>Ce capteur vous permettra d'adapter la luminosité de la pièce que vous souhaitez.</p>
        </div>
        <img class="image_products" src="views/styles/ressources/images/rsz_capteur_lum.jpg" alt="capteur lum" title="capteur lum">
      </div>
    </article>
    <article>
      <div class="flex_products">
        <div class="flex_products2">
          <h2>Capteur de température</h2>
          <p>Ce capteur vous permettra d'adapter la température de la pièce que vous souhaitez.</p>
        </div>
        <img class="image_products" src="views/styles/ressources/images/rsz_capteur_temp.jpg" alt="capteur temp" title="capteur temp">
      </div>
    </article>
    <article>
      <div class="flex_products">
        <div class="flex_products2">
          <h2>Capteur d'humidité</h2>
          <p>Ce capteur vous permettra de connaître le taux d'humidité de la pièce que vous souhaitez.</p>
        </div>
      <img class="image_products" src="views/styles/ressources/images/rsz_capteur_humi.jpg" alt="capteur humi" title="capteur humi">
      </div>
    </article>
    <article>
      <div class="flex_products">
        <div class="flex_products2">
          <h2>Detecteur de mouvement</h2>
          <p>Ce detecteur vous avertira des eventuels mouvements dans la pièce où celui-ci est installé
           et sera relié au système de sécurité pour prévenir les intrusions.</p>
        </div>
        <img class="image_products" src="views/styles/ressources/images/rsz_detecteur_mouv.jpg" alt="detecteur mouv" title="detecteur mouv">
      </div>
    </article>
    <article>
      <div class="flex_products">
        <div class="flex_products2">
          <h2>Détecteur de fumée</h2>
          <p>Ce detecteur vous avertira en cas de présence de fumée dans la pièce où celui-ci est installé.</p>
        </div>
        <img class="image_products" src="views/styles/ressources/images/rsz_detecteur_fum.jpg" alt="capteur fum" title="detecteur fum">
      </div>
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
    <h2> Nos actionneurs </h2>
    <article>
      <div class="flex_products">
        <div class="flex_products2">
          <h2> Actionneur volet roulant électrique </h2>
          <p> Ce dispositif vous permettra d'ouvrir ou fermer automatiquement tous vos volets, tout cela sans le moindre effort. </p>
        </div>
        <img class="image_products" src="views/styles/ressources/images/rsz_actionneur_volet.jpg" alt="actionneur volet" title="actionneur volet">
      </div>
    </article>
    <article>
      <div class="flex_products">
        <div class="flex_products2">
          <h2> Actionneur portail électrique </h2>
          <p>Ce dispositif vous permettra d'ouvrir ou fermer automatiquement votre portail, tout cela sans le moindre effort.</p>
        </div>
        <img class="image_products" src="views/styles/ressources/images/rsz_actionneur_port.jpg" alt="actionneur port" title="actionneur port">
      </div>
    </article>
      <article>
          <div class="flex_products">
              <div class="flex_products2">
                  <h2> Actionneur lumière </h2>
                  <p>Ce dispositif vous permettra d'allumer et d'eteindre vos lampes ainsi que de régler l'intensitée lumineuse des pieces , tout cela sans le moindre effort.</p>
              </div>
              <img class="image_products" src="views/styles/ressources/images/actionneur_lum.jpg" alt="actionneur lumiere" title="actionneur lumiere">
          </div>
      </article>
      <article>
          <div class="flex_products">
              <div class="flex_products2">
                  <h2> Actionneur chauffage </h2>
                  <p>Ce dispositif vous permettra de regler le chauffage à l'intérieur de votre habitation.</p>
              </div>
              <img class="image_products" src="views/styles/ressources/images/actionneur_chauf.jpg" alt="actionneur chauffage" title="actionneur chauffage">
          </div>
      </article>
      <article>
          <div class="flex_products">
              <div class="flex_products2">
                  <h2> Actionneur climatisation </h2>
                  <p>Ce dispositif vous permettra d'actionner la climatisation dans une piece de la maison.</p>
              </div>
              <img class="image_products" src="views/styles/ressources/images/actionneur_clim.jpg" alt="actionneur clim" title="actionneur clim">
          </div>
      </article>
      <article>
          <div class="flex_products">
              <div class="flex_products2">
                  <h2> Actionneur porte </h2>
                  <p>Ce dispositif vous permettra d'ouvrir ou fermer automatiquement une porte de votre domicile.</p>
              </div>
              <img class="image_products" src="views/styles/ressources/images/actionneur_porte.jpg" alt="actionneur porte" title="actionneur porte">
          </div>
      </article>
      <article>
          <div class="flex_products">
              <div class="flex_products2">
                  <h2> Actionneur fenêtre </h2>
                  <p>Ce dispositif vous permettra d'ouvrir ou fermer automatiquement une fenetre de votre domicile.</p>
              </div>
              <img class="image_products" src="views/styles/ressources/images/actionneur_fen.jpg" alt="actionneur fen" title="actionneur fen">
          </div>
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
    <h2> Nos caméras </h2>
    <article>
      <div class="flex_products">
        <div class="flex_products2">
          <h2>Caméra de surveillance</h2>
          <p>Les caméras de surveillance vous permettront de sécuriser d'avantage votre domicile, vous pourrez voir en direct ce qu'il se passe dans votre logement.</p>
        </div>
        <img class="image_products" src="views/styles/ressources/images/rsz_camera_surv.jpg" alt="camera surv" title="camera surv">
      </div>
    </article>
    <article>
      <div class="flex_products">
        <div class="flex_products2">
          <h2>Caméra de palier </h2>
          <p>Les caméras de porte ou de palier vous permettront d'apporté une sécurité lors de l'ouverture de celle-ci, en effet vous pourrez voir qui a sonné chez vous et vous protéger d'une instrusion.</p>
        </div>
        <img class="image_products" src="views/styles/ressources/images/rsz_camera_pal.jpg" alt="camera pal" title="camera pal">
      </div>
    </article>
  </section>
  <?php
  $home = ob_get_clean();
  return $home;
}

function content_home() {
  ob_start();
  ?>
  <aside>
  <div class="home_div">

    <h2 class="title_home">Accueil eHome</h2>

    <section class="home_section_1">
      <p>Notre <a class="lien" href="index.php?cible=about-us">société</a> propose des systèmes électroniques de domotique depuis 2016. Nous
        mettons à votre disposition plusieurs solutions, allant de la vente à l’installation en passant
        par le suivi de vos équipements. Ces équipements vous permettront d’allier sécurité de
        votre habitation et économie, dans le respect de l’environnement. Les systèmes sont
        adaptés aux besoins de chacun afin de vous assurer une prestation sur mesure."</p>
    </section>

  </div>

  <div class="home_div">

    <h2>Vos avis</h2>
    <div class="flexbox_home">
    <section class="home_section_2">
      <h3>Déploiement de qualité</h3>
      <p>"eHome a effectué l’installation de capteurs de température
        et de luminosité dans toutes les pièces de notre appartement
        de 90m2. Ces équipements ont été parfaitement installés. En
        effet, nous n’avons jamais eu de problèmes techniques, et nous
        avons même pu effectué des économies sur nos factures."</p>
      <p>Y.S (Paris 75)<p>
      </section>

      <section class="home_section_2">
      <h3>Entreprise très professionnelle</h3>
      <p>"Le SAV est très bon. Il répond vite, le seul petit soucis que nous
        avons eu avec un capteur a été réglé très rapidement par l’équipe
        technique. Des professionnels à l’écoute de leur client et
        très efficaces."</p>
      <p>M.T (La Garenne 92)</p>
    </section>
  </div>
  </div>
  </aside>

 <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_legal_information() {
  ob_start();
  ?>
  <section class="legal_information">
    <h3>Informations légales : </h3>

    <p> eHome (SAS) fabrique, distribue et vend des produits électroniques (les “Équipements”).
    Les Services sont la propriété de eHome, société par actions simplifiée à associé unique :
    au capital de 10 000 euros immatriculée au Registre du Commerce et des Sociétés de Paris, sous le numéro xxx xxx xxx
    VA intracommunautaire : xxx xx xx xxxxxxxxx xxxxxxxxxxxxx
    et dont le siège social est situé: </p>

    <ul>
	     <li> 10 rue de Vanves </li>
	     <li> 92130 Issy-les-Moulineaux </li>
	     <li> tél : +33 1 23 45 67 89 </li>
	     <li> courriel : serviceclient@ehome.fr </li>
    </ul>

    <p> Le directeur de publication des Services eHome est Mme/M xxxxxxxxxx, en qualité de Directrice/Directeur Générale de eHome.
      Le site www.eHome.fr est hébergé sur les matériels informatiques de la société  eHome, sur le site de Paris, dont le siège social est situé au 10 rue de Vanves, 92130 Issy-les-Moulineaux. </p>
  </section>

  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function content_about_us(){
  ob_start();
  ?>
    <div class="home_div">
        <h2 class="title_home">A propos d'eHome</h2>
        <section class="home_section_1">
            <h3> Les valeurs des eHomers </h3>
            <ul>
                <li> Rechercher le confort de chacun de nos clients. </li>
                <li> Innover pour avancer et faire avancer le monde. </li>
                <li> Fonder toutes les relations sur la confiance et la responsabilisation. </li>
            </ul>
        </section>
    </div>


    <div class="home_div">
        <section class="home_section_1">
            <h3 class="title_home"> L’innovation au cœur de l’internet des objets </h3>
            <p> "Envie d'une maison confortable, moderne et qui vous ressemble ?
                Découvrez tout ce qu'il est possible de faire aujourd'hui avec la domotique.
                Au-delà des volets roulants, de nombreux équipements,
                comme l'éclairage ou le chauffage, peuvent être automatisés
                pour gagner du temps et faire des économies !" </p>
        </section>
        <h2 class="title_home"> eHome plus en détail </h2>
    </div>




    <div class="flexbox_home">  <?php /* il faudrait annuler le retour à la ligne ici...*/ ?>

        <section class="home_section_2">
            <h3> Notre histoire </h3>
            <p> Depuis notre création en 2013, nous avons à cœur de vous accompagner
                dans votre quotidien et de prendre part à la révolution numérique qui bouleverse nos vies. </p>
        </section>


        <section class="home_section_2">
            <h3> Espace presse </h3>
            <p> Découvrez nos dernières annonces </p>
        </section>


        <section class="home_section_2">
            <h3> Document de référence </h3>
            <p> Lire le rapport annuel </p>
        </section>
    </div>


    <div class="home_div">
        <h2 class="title_home"> Ce que nous vous proposons </h2>
        <section class="home_section_1">
            <h3 class="title_home"> Un gain de temps et de confort au quotidient </h3>
            <p> Il est 7h00. Vous vous réveillez au son de votre
                radio préférée qui s'est allumée toute seule. La cuisine est baignée d'une douce lumière.
                L'odeur du café vous accompagne pendant que la salle de bains est réchauffée automatiquement
                à la température idéale pour votre douche matinale. Tout est prêt pour démarrer votre journée
                dans les meilleures conditions... Ceci n'est pas un rêve, mais la réalité.
                En plus de vous simplifier les gestes de la vie de courante, nos solutions
                domotiques vous permettent de programmer une multitude de scénarios
                (éclairage, température...) en fonction de vos habitudes et vos envies.
                Vous allez vous coucher ? A partir d'une seule commande, vous fermez
                tous les volets roulants, abaissez le chauffage et éteignez les lumières.
                Le confort absolu ! </p>
        </section>
    </div>

    <div class="home_div">
        <section class="home_section_1">
            <h3 class="title_home"> Des économies d'énergie à la clé </h3>
            <p> A l'approche de l’hiver, vous allumez davantage les lumières et remettez le
                chauffage en marche. En vous équipant de notre installation domotique,
                vous réalisez automatiquement des économies. En effet, d'un geste, vous pouvez
                éteindre les éclairages inutiles, couper les appareils électriques en veille
                ou tempérer le chauffage. Mieux encore : un thermostat d’ambiance à gestion
                programmée vous permettra par exemple de réduire vos consommations d'énergie
                sans changer vos habitudes. Vous indiquez votre température idéale pour chaque
                pièce et chaque moment de la semaine. Puis, le système s'occupe du reste
                en s'adaptant à votre style de vie et votre présence dans la maison. </p>
        </section>
    </div>

    <div class="home_div">
        <section class="home_section_1">
            <h3 class="title_home"> Pour votre sécurité et celle de votre maison </h3>
            <p> Au moment de sortir de chez vous ou de partir en vacances, plus besoin de
                passer toutes les pièces en revue. Comme les équipements domotiques sont
                désormais connectés, vous pouvez les piloter à distance depuis votre smartphone
                ou votre tablette. Vous restez donc en contact avec votre maison où que
                vous soyez, même à l'autre bout du monde ! A tout moment, vous pouvez par
                exemple vérifier que tout est en ordre, de la lumière des différentes pièces
                à la mise en route de l’alarme. Mais aussi, grâce à un visiophone ou un portier
                vidéo connecté, voir qui sonne à votre porte ou qui est venu en votre absence.
                Et en cas de problème (intrusion, fumée...), la sirène se déclenche et vous
                recevez automatiquement un SMS sur votre téléphone. Alors, partez tranquille ! </p>
        </section>
    </div>

  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

// fonction qui génère l'affichage du formulaire de connexion, l'argument permet un affichage des messages d'erreur
function form_signin() {
  ob_start();
  ?>

  <form method="post" action="index.php?cible=connexion_request">
    <section class="form_signin">
      <fieldset>
        <legend><h3 class="titre">Connexion</h3></legend>
        <div class="content_center">
          <div class="input">
            <label for="login"><strong>Identifiant :</strong></label><br/>
            <input type="text" name="login" id="login" placeholder="Votre identifiant"/>
            <img src="views/styles/ressources/icons/info.png" alt="icone information" title="Saisissez votre identifiant">
          </div>
          <div class="input">
            <label for="password"><strong>Mot de passe :</strong></label><br/>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe"/>
            <img src="views/styles/ressources/icons/info.png" alt="icone information" title="Saisissez le mot de passe associé à votre compte">
          </div>
        </div>
        <div class="bouton_connexion">
          <input type="submit" value="Se connecter"/>
        </div>
        <div class="not_yet">Pas encore inscrit ? Rejoignez-nous en cliquant <a class="lien" href="index.php?cible=join-us_type">ici</a>.</div>
      </fieldset>
    </section>
  </form>
  <?php
  $formulaire = ob_get_clean();
  return $formulaire;
}

// fonction qui génère l'affichage du formulaire d'inscription en fonction du type de personne qui s'inscrit (admnistrateur ou utilisateur)
function form_subscribe_user() {
  ob_start();
  ?>
  <form method="post" action="index.php?cible=form_subscribe_user">
    <section>
    <article>
    <fieldset>
      <legend><h3>Informations de connexion</h3></legend>
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
      <legend><h3>Informations personnelles</h3></legend>
        <p>
          <label for="civilité">Civilité <br/>
          <input type="radio" name="civilite" value="Monsieur" id="monsieur"/>
          <label for="monsieur">Monsieur</label><br/>
          <input type="radio" name="civilite" value="Madame" id="madame"/>
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
            <option value="" selected>-- Sélectionnez un pays --</option>
            <optgroup label="Europe">
              <option value="Allemagne">Allemagne</option>
              <option value="Autriche">Autriche</option>
              <option value="Belgique">Belgique</option>
              <option value="Bulgarie">Bulgarie</option>
              <option value="Chypre">Chypre</option>
              <option value="Croatie">Croatie</option>
              <option value="Danemark">Danemark</option>
              <option value="Espagne">Espagne</option>
              <option value="Estonie">Estonie</option>
              <option value="Finlande">Finlande</option>
              <option value="France">France</option>
              <option value="Grece">Grèce</option>
              <option value="Hongrie">Hongrie</option>
              <option value="Irlande">Irlande</option>
              <option value="Italie">Italie</option>
              <option value="Lettonie">Lettonie</option>
              <option value="Lituanie">Lituanie</option>
              <option value="Luxembourg">Luxembourg</option>
              <option value="Malte">Malte</option>
              <option value="Norvege">Norvège</option>
              <option value="Pays-Bas">Pays-Bas</option>
              <option value="Pologne">Pologne</option>
              <option value="Portugal">Portugal</option>
              <option value="République-Tchèque">République tchèque</option>
              <option value="Roumanie">Roumanie</option>
              <option value="Royaume-Uni">Royaume-Uni</option>
              <option value="Slovaquie">Slovaquie</option>
              <option value="Slovenie">Slovénie</option>
              <option value="Suede">Suède</option>
              <option value="Suisse">Suisse</option>
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
            <option value="" selected>-- Choisissez un moyen de paiement --</option>
            <option value="Prélèvement automatique mensuel">Prélèvement automatique mensuel</option>
            <option value="Prélèvement automatique annuel">Prélèvement automatique annuel</option>
            <option value="Chèque mensuel">Chèque mensuel</option>
            <option value="Chèque annuel">Chèque annuel</option>
          </select>
        </p>
    </fieldset>
    </article>

    <article>
    <fieldset>
      <legend><h3>Logement</h3></legend>
        <p>
          <label for="adresse_logement">Adresse</label><br/>
          <input type="text" name="adresse_logement" id="adresse_logement" placeholder="Adresse du domicile" required/>
        </p>
        <p>
          <label for="code_postal_logement">Code postal</label><br/>
          <input type="number" name="code_postal_logement" id="code_postal_logement" min="0" placeholder="Code postal" required/>
        </p>
        <p>
          <label for="ville_logement">Ville</label><br/>
          <input type="text" name="ville_logement" id="ville_logement" placeholder="Ville" required/>
        </p>
        <p>
          <label for="pays_logement">Pays</label><br/>
          <select name="pays_logement" id="pays_logement" required>
            <option value="" selected>-- Sélectionnez un pays --</option>
            <optgroup label="Europe">
              <option value="Allemagne">Allemagne</option>
              <option value="Autriche">Autriche</option>
              <option value="Belgique">Belgique</option>
              <option value="Bulgarie">Bulgarie</option>
              <option value="Chypre">Chypre</option>
              <option value="Croatie">Croatie</option>
              <option value="Danemark">Danemark</option>
              <option value="Espagne">Espagne</option>
              <option value="Estonie">Estonie</option>
              <option value="Finlande">Finlande</option>
              <option value="France">France</option>
              <option value="Grece">Grèce</option>
              <option value="Hongrie">Hongrie</option>
              <option value="Irlande">Irlande</option>
              <option value="Italie">Italie</option>
              <option value="Lettonie">Lettonie</option>
              <option value="Lituanie">Lituanie</option>
              <option value="Luxembourg">Luxembourg</option>
              <option value="Malte">Malte</option>
              <option value="Norvege">Norvège</option>
              <option value="Pays-Bas">Pays-Bas</option>
              <option value="Pologne">Pologne</option>
              <option value="Portugal">Portugal</option>
              <option value="République-Tchèque">République tchèque</option>
              <option value="Roumanie">Roumanie</option>
              <option value="Royaume-Uni">Royaume-Uni</option>
              <option value="Slovaquie">Slovaquie</option>
              <option value="Slovenie">Slovénie</option>
              <option value="Suede">Suède</option>
              <option value="Suisse">Suisse</option>
            </optgroup>
          </select>
        </p>
        <p>
          <label for="nb_habitant">Nombre d'habitants</label><br/>
          <input type="number" name="nb_habitant" id="nb_habitant" min="0" placeholder="Nombre d'habitants" required/>
        </p>
        <p>
          <label for="superficie">Superficie (m²)</label><br/>
          <input type="text" name="superficie" id="superficie" min="0" placeholder="Superficie (m²)" required/>
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

function form_subscribe_admin() {
  ob_start();
  ?>
  <form method="post" action="index.php?cible=subscribe_admin">
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
          <input type="radio" name="civilite" value="Monsieur" id="monsieur"/>
          <label for="monsieur">Monsieur</label><br/>
          <input type="radio" name="civilite" value="Madame" id="madame"/>
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
          <label for="pays_admin">Pays</label><br/>
          <select name="pays_admin" id="pays_admin" required>
            <option value="" selected>-- Sélectionnez un pays --</option>
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
    </fieldset>
    </article>

    <p class="bouton">
      <input type="reset" value="Rafraichir">
      <input type="submit" value="S'inscrire"/>
    </p>
  </form>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

// fonction responsable de l'affichage du bloc "Pièce(s)" dans home_management.php
function my_room($my_home) {
  ob_start();
  ?>
  <section class="room_info">
    <div id="content_info_room">
    <h3><?php if(count($my_home) == 2) {
                echo('Pièce');
                } else {
                  echo('Pièces');
                }?>
    </h3>
    <div id="room_block">
    <?php
    if ($my_home == array()) {
      ?>
      <h2 class="except_h2">Veuillez ajouter des pièces pour permettre l'affichage les données</h2>
      <?php
    } else {
      for($i = 0; $i < count($my_home); $i++) {
        if($i % 2 == 0) {
          ?>
          <article>
            <div class="top">
              <div class="child_top">
                <h3>
                  <a href='index.php?cible=device_management&amp;id_piece=<?php echo($my_home[$i][0]); ?>'>
                    <?php echo($my_home[$i][1]); ?></a>
                </h3>
                <strong><?php echo('n°'.$my_home[$i][0]); ?></strong>
              </div>
              <img id="trash" class="trash<?php echo($i);?>" src="views/styles/ressources/icons/trash1.png" title='Supprimer la pièce'
              onclick="deleteRoom(<?php echo("'".addslashes($my_home[$i][1])."'");?>, <?php echo("'".$my_home[$i][0]."'") ?>)" onmouseover="this.src='views/styles/ressources/icons/trash2.png'"
              onmouseout="this.src='views/styles/ressources/icons/trash1.png'">
            </div>
            <script type="text/javascript" src="views/scripts/myRoom1.js"></script>
          <?php
        } else {
          if($my_home[$i] == array()) {
            ?>
            <h2 class="except_h2" id="no_device">Aucun dispositif</h2>
            <a href='index.php?cible=device_management&amp;id_piece=<?php echo($my_home[$i-1][0]); ?>'><button>Ajouter des dispositifs</button></a></article>
            <?php
          } else {
            ?>
            <div class="devices">
            <?php
            for($j = 0; $j < count($my_home[$i])-1; $j++) {
              if($j % 2 == 0) {
                echo($my_home[$i][$j].' x ');
              } else {
                echo($my_home[$i][$j].'<br/><br/>');
              }
            }
            if($j % 2 == 0) {
              echo($my_home[$i][count($my_home[$i])-1].' x ');
            } else {
              echo($my_home[$i][count($my_home[$i])-1]);
            }
            ?>
            </div>
            <a href='index.php?cible=device_management&amp;id_piece=<?php echo($my_home[$i-1][0]); ?>'><button>Modifier les dispositifs</button></a>
            </article>
            <?php
          }
        }
      }
    }
      ?>
        <form id="form" method="post" action="index.php?cible=room_add">
          <script type="text/javascript" src="views/scripts/myRoom2.js"></script>
          </div>
          </div>
          <div class="bouttons_pièce">
          <input id="submit" type="submit" value="Confirmer les modifications">
        </form>
        <div class="add_bouttons">
          <button onclick="addRoom();">Ajouter une pièce</button>
          <button onclick="annuler();">Annuler</button>
        </div>
      </div>
      </section>
    <?php
  $content = ob_get_clean();
  return $content;
}

// fonction responsable de l'affichage du bloc "Mon domicile" dans home_user.php
function my_notif() {
  ob_start();
  ?>
  <div class="top_aside">
  <section class="notif_info">
    <div class="top_notif">
      <h3>Mon domicile</h3>
      <strong>
        <?php
        $current_date = current_date();
        echo($current_date[0].' '.$current_date[1].' '.$current_date[2].' '.$current_date[3]);
        ?>
        <div id="afficherheure"></div>
      </strong>
    </div>
    <div class="content_notif">
      <h2 class="except_h2">Aucune notification</h2>
    </div>
    <div id="bouton_notif_info"><a href="index.php?cible=notif_user"><button>Voir toutes les notifications</button></a></div>
    <script type="text/javascript">
      setInterval(function(){
          document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
      }, 1000);
    </script>
  </section>

  <?php
  $home = ob_get_clean();
  return $home;
}

// fonction gérant l'affichage des informations générales de l'utilisateur
function my_basic_info($info_user) {
  ob_start();

  if ($_SESSION['type'] == 'user') {
    ?>
      <section class="basic_info">
        <div class="content_my_info">
          <h3>Mes informations client</h3>
          <div id="child_content_my_info">
            <p><strong>Civilité : </strong><?php echo(maj_lettre1($info_user['civilite'])); ?></p>
            <p><strong>Nom : </strong><?php echo($info_user['nom']); ?></p>
            <p><strong>Prénom : </strong><?php echo($info_user['prenom']); ?></p>
            <p><strong>Adresse : </strong><?php echo($info_user['adresse']); ?></p>
            <p><strong>Code postal : </strong><?php echo($info_user['code_postal']); ?></p>
            <p><strong>Ville : </strong><?php echo(maj_lettre1($info_user['ville'])); ?></p>
            <p><strong>Pays : </strong><?php echo(maj_lettre1($info_user['pays'])); ?></p>
          </div>
        </div>
        <div id="bouton_basic_info"><a href="index.php?cible=info_user"><button>Voir les informations complètes</button></a></div>
      </section>
      </div>
    <?php
  } else {
    ?>
      <section class="box">
        <h3>Mes informations administrateur</h3>
        <p><strong>Civilité : </strong><?php echo($info_user['civilite']); ?></p>
        <p><strong>Nom : </strong><?php echo($info_user['nom']); ?></p>
        <p><strong>Prénom : </strong><?php echo($info_user['prenom']); ?></p>
        <p><strong>Pays : </strong><?php echo($info_user['pays']); ?></p>
        <p><a href="index.php?cible=info_admin"><button>Voir les informations complètes</button></a></p>
      </section>


    <?php
  }
  $info = ob_get_clean();
  return $info;
}

function form_device_state($list_room_user, $list_device_user) {
  ob_start();
  if ($list_room_user != array()) {
    ?>
    <section class="device_state" id="device_state">
      <h3>Etat du domicile</h3><br/>
      <form name="form_device_state" method="post" action="index.php?cible=home_user#device_state">
        <div class="zoneDefaut">
          <div>
            <label for="type_affichage"><strong>Affichage par :</strong></label><br/>
            <select name="type_affichage" id="type_affichage" required onChange="printForm()">
              <option value="" selected disabled>-- Sélectionnez un mode d'affichage --</option>
              <option value="piece">Pièce</option>
              <option value="dispositif">Dispositif</option>
            </select>
          </div>
          <div id="zoneAjout"></div>
        </div>
        <div id="zoneBouton"></div>
        <script type="text/javascript">
          function printForm() {
            var index = document.form_device_state.type_affichage.selectedIndex;
            var label = document.createElement("label");
            var strong = document.createElement("strong");
            var br = document.createElement("br");
            var select = document.createElement("select");
            var options = [];
            var submit = document.createElement("input");
            submit.setAttribute("type", "submit");
            submit.setAttribute("value", "Confirmer");
            submit.id = "submit";
            label.id = "label";
            strong.id = "strong";
            select.id = "select";
            select.name = "options[]";
            select.setAttribute("required", "");
            label.setAttribute("for", "select");

            if (document.getElementById("select")) {
              document.getElementById("zoneAjout").replaceChild(label, document.getElementById("label"));
              document.getElementById("label").appendChild(strong);
              document.getElementById("label").appendChild(br);
              document.getElementById("zoneAjout").replaceChild(select, document.getElementById("select"));
              document.getElementById("zoneBouton").replaceChild(submit, document.getElementById("submit"));
            } else {
              document.getElementById("zoneAjout").appendChild(label);
              document.getElementById("label").appendChild(strong);
              document.getElementById("label").appendChild(br);
              document.getElementById("zoneAjout").appendChild(select);
              document.getElementById("zoneBouton").appendChild(submit);
            }

            if (index == 1) { // pièce
              strong.textContent = "Pièce à afficher :";
              <?php
              foreach ($list_room_user as $cle => $valeur) {
                echo "options[$cle] = '$valeur';";
              }
              ?>
              options.unshift("-- Sélectionnez une pièce --");
              submit.name = "room";
            } else if (index == 2) { // dispositif
              strong.textContent = "Type de dispositif à afficher :";
              <?php
              foreach ($list_device_user as $cle => $valeur) {
                echo "options[$cle] = '$valeur';";
              }
              ?>
              options.unshift("-- Sélectionnez un dispositif --");
              submit.name = "device";
            }
            for(var j = 0; j < options.length; j++) {
              var option = document.createElement("option");
              if (j === 0) {
                option.text = options[j];
                option.value = "";
              } else {
                option.text = option.value = options[j];
              }
              document.getElementById("select").appendChild(option);
            }
          }
        </script>
      </form>
    <?php
   }
  $content = ob_get_clean();
  return $content;
}

function device_state($data_state) {
  ob_start();
  if ($data_state != array()) {
    ?>
    <form method="post" action="index.php?cible=device_state_management">
      <div class="bloc_affichage_donnees">
        <div class="child_affichage_donnees">
          <h3>
            <?php
            if ($data_state[0] == "piece") {
              echo($data_state[1][1].' (n°'.$data_state[1][0].')');
            } else {
              echo($data_state[1][1]);
            }
            ?>
          </h3>
          <?php
          if(count($data_state) > 2) {
          ?>
            <div class="content_affichage_donnees">
              <?php
              for ($i = 2; $i < count($data_state); $i++) {
                ?>
                <article <?php if($data_state[$i][3] == "oui") {echo("class='alerte'");}?>>
                  <div class="top_device">
                    <div class="child_top_device">
                      <h3><a href="index.php?cible=device_info&amp;id_device=<?php echo($data_state[$i][0]); ?>"><?php echo($data_state[$i][1]); ?></a></h3>
                      <strong><?php echo('n°'.$data_state[$i][0]); ?></strong>
                    </div>
                    <label class="switch">
                      <input type='hidden' name="checkbox_<?php echo($data_state[$i][0]); ?>" value="off">
                      <input type="checkbox" name="checkbox_<?php echo($data_state[$i][0]); ?>" <?php if ($data_state[$i][2] == "on") {echo("checked");}?> >
                      <div class="slider round"></div>
                    </label>
                  </div>
                  <?php if ($data_state[0] == "dispositif") {echo('<div class="room_device"><strong>'.$data_state[$i][5].'</strong></div>');} ?>
                  <div class="content_device">
                    <?php
                    switch ($data_state[$i][1]) {
                      case "Capteur de luminosité":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/luminosite.png" alt="Icone luminosité" class="icon_device">
                          <div class="device_data">
                            <p id="mesure1"><?php echo($data_state[$i][3].'%'); ?></p>
                            <p id="date_mesure"><?php echo($data_state[$i][4]); ?></p>
                          </div>
                          <?php
                        }
                        break;

                      case "Capteur de température":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/temperature.png" alt="Icone température" class="icon_device">
                          <div class="device_data">
                            <p id="mesure1"><?php echo($data_state[$i][3].'°C'); ?></p>
                            <p id="date_mesure"><?php echo($data_state[$i][4]); ?></p>
                          </div>
                          <?php
                        }
                        break;

                      case "Capteur d'humidité":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/humidite.png" alt="Icone humidité" class="icon_device">
                          <div class="device_data">
                            <p id="mesure1"><?php echo($data_state[$i][3].'%'); ?></p>
                            <p id="date_mesure"><?php echo($data_state[$i][4]); ?></p>
                          </div>
                          <?php
                        }
                        break;

                      case "Détecteur de mouvement":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/mouvement.png" alt="Icone mouvement" class="icon_device">
                          <div class="device_data">
                            <p id="mesure2">
                              <?php
                              if ($data_state[$i][3] == "non") {
                                echo("<strong>Aucun mouvement</strong>");
                              } else {
                                echo("<strong>Mouvement détecté !</strong>");
                              };
                              ?>
                            </p>
                            <p id="date_mesure"><?php echo($data_state[$i][4]); ?></p>
                          </div>
                          <?php
                        }
                        break;

                      case "Détecteur de fumée":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/fumee.png" alt="Icone fumée" class="icon_device">
                          <div class="device_data">
                            <p id="mesure2">
                              <?php
                              if ($data_state[$i][3] == "non") {
                                echo("<strong>Pas de fumée détectée</strong>");
                              } else {
                                echo("<strong>Fumée détectée !</strong>");
                              };
                              ?>
                            </p>
                            <p id="date_mesure"><?php echo($data_state[$i][4]); ?></p>
                          </div>
                          <?php
                        }
                        break;

                      case "Actionneur chauffage":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/chauffage.png" alt="Icone chauffage" class="icon_device">
                          <div class="device_data">
                            <strong>Régler sur :</strong>
                            <p id="mesure1"><input id="input_chauffage" type="number" name="chauffage_<?php echo($data_state[$i][0]); ?>" min="7" max="30" value="<?php echo($data_state[$i][3]); ?>">°C</p>
                          </div>
                          <?php
                        }
                        break;

                      case "Actionneur climatisation":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/climatisation.png" alt="Icone climatisation" class="icon_device">
                          <div class="device_data">
                            <strong>Régler sur :</strong>
                            <p id="mesure1">P<input id="input_climatisation" type="number" name="climatisation_<?php echo($data_state[$i][0]); ?>" min="1" max="5" value="<?php echo($data_state[$i][3]); ?>"></p>
                          </div>
                          <?php
                        }
                        break;

                      case "Actionneur porte":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/porte.png" alt="Icone porte" class="icon_device">
                          <div class="device_data">
                            <input type="range" name="porte_<?php echo($data_state[$i][0]); ?>" min="1" max="5" value="<?php echo($data_state[$i][3]); ?>">
                            <div class="label_range">
                              <p>Ouverte</p>
                              <p>Fermée</p>
                            </div>
                          </div>
                          <?php
                        }
                        break;

                      case "Actionneur fenêtre":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/fenetre.png" alt="Icone fenêtre" class="icon_device">
                          <div class="device_data">
                            <input type="range" name="fenetre_<?php echo($data_state[$i][0]); ?>" min="1" max="5" value="<?php echo($data_state[$i][3]); ?>">
                            <div class="label_range">
                              <p>Ouverte</p>
                              <p>Fermée</p>
                            </div>
                          </div>
                          <?php
                        }
                        break;

                      case "Actionneur volet":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/volet.png" alt="Icone volet" class="icon_device">
                          <div class="device_data">
                            <input type="range" name="volets_<?php echo($data_state[$i][0]); ?>" min="1" max="5" value="<?php echo($data_state[$i][3]); ?>">
                            <div class="label_range">
                              <p>Ouverts</p>
                              <p>Fermés</p>
                            </div>
                          </div>
                          <?php
                        }
                        break;

                      case "Actionneur portail":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/portail.png" alt="Icone portail" class="icon_device">
                          <div class="device_data">
                            <input type="range" name="portail_<?php echo($data_state[$i][0]); ?>" min="1" max="5" value="<?php echo($data_state[$i][3]); ?>">
                            <div class="label_range">
                              <p>Ouvert</p>
                              <p>Fermé</p>
                            </div>
                          </div>
                          <?php
                        }
                        break;

                      case "Actionneur lumière":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          ?>
                          <img src="views/styles/ressources/icons/lumiere.png" alt="Icone lumiere" class="icon_device">
                          <div class="device_data">
                            <input type="range" name="porte_<?php echo($data_state[$i][0]); ?>" min="1" max="2" value="<?php echo($data_state[$i][3]); ?>">
                            <div class="label_range">
                              <p>Allumée</p>
                              <p>Eteinte</p>
                            </div>
                          </div>
                          <?php
                        }
                        break;

                      case "Caméra de surveillance":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucun affichage</h3>');
                        } else {
                          ?>
                          <a href="index.php?cible=device_info&amp;id_device=<?php echo($data_state[$i][0]); ?>"><img src="views/styles/ressources/icons/camera.png" alt="Icone caméra" class="icon_device"></a>
                          <?php
                        }
                        break;

                      case "Alarme":
                        if ($data_state[$i][2] == "off") {
                          echo('<h3 class=\'except_h2\'>Dispositif désactivé</h3>');
                        } elseif ($data_state[$i][3] == "") {
                          echo('<h3 class=\'except_h2\'>Aucune données</h3>');
                        } else {
                          if ($data_state[$i][3] == "non") {
                            echo("<img src='views/styles/ressources/icons/alarm_off.png' alt='Icone alarme éteinte' class='icon_device'>");
                          } else {
                            echo("<img src='views/styles/ressources/icons/alarm_on.png' alt='Icone alarme allumée' class='icon_device'>");
                          };
                          ?>
                          <div class="device_data">
                            <p id="mesure2">
                              <?php
                              if ($data_state[$i][3] == "non") {
                                echo("<strong>Pas de sonnerie</strong>");
                              } else {
                                echo("<strong>Sonnerie !</strong>");
                              };
                              ?>
                            </p>
                          </div>
                          <?php
                        }
                        break;

                    }
                    ?>
                  </div>
                  <div class="bottom_device">
                    <a href="index.php?cible=device_info&amp;id_device=<?php echo($data_state[$i][0]); ?>"><button>Données complètes</button></a>
                  </div>
                </article>
                <?php
              }
              ?>
            </div>
            <div class="boutton_confirmation">
              <input type="reset" value="Rafraichir">
              <input type="submit" value="Confirmer les modifications sur les dispositifs">
            </div>
        <?php
        } else {
          echo "<h2 class='except_h2'>Cette pièce ne contient aucun dispositif</h2>";
        }?>
        </div>
      </div>
    </form>
    <?php
  }
  ?>
  </section>
  <?php
  $content = ob_get_clean();
  return $content;
}

function content_info_admin($info_user) {
  ob_start();
  ?>
  <section class="info_admin">
      <h3>Mes informations administrateur</h3>
      <p><strong>Id : </strong><?php echo($info_user['id']); ?></p>
      <p><strong>Identifiant : </strong><?php echo($info_user['identifiant']); ?></p>
      <p><strong>Civilité : </strong><?php echo($info_user['civilite']); ?></p>
      <p><strong>Nom : </strong><?php echo($info_user['nom']); ?></p>
      <p><strong>Prénom : </strong><?php echo($info_user['prenom']); ?></p>
      <p><strong>Date de naissance : </strong><?php echo($info_user['date_naissance']); ?></p>
      <p><strong>Nationalité : </strong><?php echo($info_user['nationalite']); ?></p>
      <p><strong>Pays : </strong><?php echo($info_user['pays']); ?></p>
      <p><strong>Mail : </strong><?php echo($info_user['mail']); ?></p>
      <p><strong>Téléphone : </strong><?php echo($info_user['telephone']); ?></p>
      <p><strong>Nombre d'utilisateurs à charge : </strong><?php echo($info_user['nb_user']); ?></p>
  </section>
  <section class="button_edit">
    <a href="index.php?cible=admin_info_edit"><button>Modifier les informations</button></a>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

// pour la page de gestion d'un client par l'administrateur
function content_gestion_user($gestion_user) {
  ob_start();
  ?>
  <section class="gestion_user">
      <h3>Informations complètes du client <?php echo($gestion_user['prenom']); ?> <?php echo($gestion_user['nom']); ?></h3>
      <p><strong>Id : </strong><?php echo($gestion_user['id']); ?></p>
      <p><strong>Identifiant : </strong><?php echo($gestion_user['identifiant']); ?></p>
      <p><strong>Civilité : </strong><?php echo($gestion_user['civilite']); ?></p>
      <p><strong>Nom : </strong><?php echo($gestion_user['nom']); ?></p>
      <p><strong>Prénom : </strong><?php echo($gestion_user['prenom']); ?></p>
      <p><strong>Date de naissance : </strong><?php echo($gestion_user['date_naissance']); ?></p>
      <p><strong>Nationalité : </strong><?php echo($gestion_user['nationalite']); ?></p>
      <p><strong>Pays : </strong><?php echo($gestion_user['pays']); ?></p>
      <p><strong>Mail : </strong><?php echo($gestion_user['mail']); ?></p>
      <p><strong>Téléphone : </strong><?php echo($gestion_user['telephone']); ?></p>
      <p><strong>Date d'inscription : </strong><?php echo($gestion_user['date_inscription']); ?></p>
  </section>
  <section class="button_edit">
    <a href="index.php?cible=user_suppression&amp;prenom=<?php echo($gestion_user['prenom']); ?>&amp;nom=<?php echo($gestion_user['nom']); ?>&amp;id_sup=<?php echo($gestion_user['id']); ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer définitivement cet utilisateur ?');";><button>Supprimer cet utilisateur</button></a>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

// pour la page de suppression d'un utilisateur
function content_user_suppression() {
  ob_start();
  ?>
  <section class="user_suppression">
      <h2 class="except_h2">L'utilisateur <?php echo($_GET['prenom'])?> <?php echo($_GET['nom'])?> à bien été supprimé définitivement.</h2>
  </section>
  <section class="button_edit">
    <a href="index.php?cible=user_management"><button>Retourner à la liste des utilisateurs</button></a>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}


function my_full_info($my_full_info) {
  ob_start();
  ?>
  <section class="user_info">
    <div class="content_user_info">
      <h3>Mes informations client</h3>
      <div id="child_content_user_info">
        <p><strong>Civilité : </strong><?php echo($my_full_info[0][0]); ?></p>
        <p><strong>Nom : </strong><?php echo($my_full_info[0][1]); ?></p>
        <p><strong>Prénom : </strong><?php echo($my_full_info[0][2]); ?></p>
        <p><strong>Date de naissance : </strong><?php echo($my_full_info[0][3]); ?></p>
        <p><strong>Nationalité : </strong><?php echo($my_full_info[0][4]); ?></p>
        <p><strong>Pays : </strong><?php echo($my_full_info[0][5]); ?></p>
        <p><strong>E-mail : </strong><?php echo($my_full_info[0][6]); ?></p>
        <p><strong>Téléphone : </strong><?php echo($my_full_info[0][7]); ?></p>
      </div>
    </div>
  </section>
  <section class="home_info">
    <div class="content_home_info">
      <h3>Informations du domicile</h3>
      <div id="child_content_home_info">
        <p><strong>Adresse : </strong><?php echo($my_full_info[1][0]); ?></p>
        <p><strong>Code postal : </strong><?php echo($my_full_info[1][1]); ?></p>
        <p><strong>Ville : </strong><?php echo($my_full_info[1][2]); ?></p>
        <p><strong>Pays : </strong><?php echo($my_full_info[1][3]); ?></p>
        <p><strong>Nombre de pièces : </strong><?php echo($my_full_info[1][4]); ?></p>
        <p><strong>Superficie : </strong><?php echo($my_full_info[1][5].' m²'); ?></p>
        <p><strong>Nombre d'habitants : </strong><?php echo($my_full_info[1][6]); ?></p>
      </div>
    </div>
  </section>
  <div class="paiement_connection_info">
    <section class="paiement_info">
      <div class="content_paiement_info">
        <h3>Informations paiement</h3>
        <div id="child_content_paiement_info">
          <p><strong>Paiement par : </strong><?php echo($my_full_info[2][0]); ?></p>
        </div>
      </div>
    </section>
    <section class="connection_info">
      <div class="content_connection_info">
        <h3>Informations de connexion</h3>
        <div id="child_content_connection_info">
          <p><strong>Identifiant : </strong><?php echo($my_full_info[3][0]); ?></p>
        </div>
      </div>
    </section>
    <section class="button_edit">
      <a href="index.php?cible=info_edit"><button>Modifier les informations</button></a>
    </section>
  </div>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function my_full_info_admin($my_full_info_admin) {
  ob_start();
  ?>
  <section class="user_info">
    <div class="content_user_info">
      <h3>Mes informations administrateur</h3>
      <div id="child_content_user_info">
        <p><strong>Civilité : </strong><?php echo($my_full_info_admin[0]); ?></p>
        <p><strong>Nom : </strong><?php echo($my_full_info_admin[1]); ?></p>
        <p><strong>Prénom : </strong><?php echo($my_full_info_admin[2]); ?></p>
        <p><strong>Date de naissance : </strong><?php echo($my_full_info_admin[4]); ?></p>
        <p><strong>Nationalité : </strong><?php echo($my_full_info_admin[5]); ?></p>
        <p><strong>Pays : </strong><?php echo($my_full_info_admin[6]); ?></p>
        <p><strong>E-mail : </strong><?php echo($my_full_info_admin[7]); ?></p>
        <p><strong>Téléphone : </strong><?php echo($my_full_info_admin[8]); ?></p>
        <p><strong>Nombre d'utilisateurs à charge : </strong><?php echo($my_full_info_admin[9]); ?></p>
      </div>
    </div>
  </section>
  <div class="paiement_connection_info">
    <section class="connection_info">
      <div class="content_connection_info">
        <h3>Informations de connexion</h3>
        <div id="child_content_connection_info">
          <p><strong>Identifiant : </strong><?php echo($my_full_info_admin[3]); ?></p>
        </div>
      </div>
    </section>
    <section class="button_edit">
      <a href="index.php?cible=admin_info_edit"><button>Modifier les informations</button></a>
    </section>
  </div>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function form_full_info($my_full_info) {
  ob_start();
  ?>
  <form method="post" action="index.php?cible=info_edit">
    <div class="form">
      <h2>Modifier mes informations</h2>
      <div class="content_info">
        <section class="user_info">
          <div class="content_user_info">
            <h3>Informations client</h3>
            <div id="child_content_user_info">
              <p>
                <label for="civilite"><strong>Civilité : </strong></label><br/>
                <input type="text" name="civilite" id="civilite" value="<?php echo($my_full_info[0][0]); ?>" required/>
              </p>
              <p>
                <label for="nom"><strong>Nom : </strong></label><br/>
                <input type="text" name="nom" id="nom" value="<?php echo($my_full_info[0][1]); ?>" required/>
              </p>
              <p>
                <label for="prenom"><strong>Prénom : </strong></label><br/>
                <input type="text" name="prenom" id="prenom" value="<?php echo($my_full_info[0][2]); ?>" required/>
              </p>
              <p>
                <label for="date_naissance"><strong>Date de naissance : </strong></label><br/>
                <input type="date" name="date_naissance" id="date_naissance" value="<?php echo($my_full_info[0][3]); ?>" required/>
              </p>
              <p>
                <label for="nationalite"><strong>Nationalité : </strong></label><br/>
                <input type="text" name="nationalite" id="nationalite" value="<?php echo($my_full_info[0][4]); ?>" required/>
              </p>
              <p>
                <label for="pays_utilisateur"><strong>Pays : </strong></label><br/>
                <?php
                  $pays = array("Allemagne", "Autriche", "Belgique", "Bulgarie", "Chypre", "Croatie", "Danemark", "Espagne", "Estonie", "Finlande", "France", "Grèce", "Hongrie", "Irlande", "Italie", "Lettonie", "Lituanie", "Luxembourg", "Malte", "Norvège", "Pays-Bas", "Pologne", "Portugal",
                                "République-Tchèque", "Roumanie", "Royaume-Uni", "Slovaquie", "Slovénie", "Suède", "Suisse");
                  $select = '<select name="pays_utilisateur" id="pays_utilisateur">';
                  foreach ($pays as $option) {
                    $select .= '<option value="'.$option.'"';
                    if ($option == $my_full_info[0][5]) {
                      $select .= ' selected';
                    }
                    $select .= '>'.$option.'</option>';
                  }
                  $select .= '</select>';
                  echo ($select);
                ?>
              </p>
              <p>
                <label for="mail"><strong>E-mail : </strong></label><br/>
                <input type="mail" name="mail" id="mail" value="<?php echo($my_full_info[0][6]); ?>" required/>
              </p>
              <p>
                <label for="telephone"><strong>Téléphone : </strong></label><br/>
                <input type="tel" name="telephone" id="telephone" maxlength="12" value="<?php echo($my_full_info[0][7]); ?>" required/>
              </p>
            </div>
          </div>
        </section>
        <section class="home_info">
          <div class="content_home_info">
            <h3>Informations du domicile</h3>
            <div id="child_content_home_info">
              <p>
                <label for="adresse"><strong>Adresse : </strong></label><br/>
                <input type="text" name="adresse" id="adresse" value="<?php echo($my_full_info[1][0]); ?>" required/>
              </p>
              <p>
                <label for="code_postal"><strong>Code postal : </strong></label><br/>
                <input type="number" name="code_postal" id="code_postal" value="<?php echo($my_full_info[1][1]); ?>" min="0" required/>
              <p>
                <label for="ville"><strong>Ville : </strong></label><br/>
                <input type="text" name="ville" id="ville" value="<?php echo($my_full_info[1][2]); ?>" required/>
              </p>
              <p>
                <label for="pays_logement"><strong>Pays : </strong></label><br/>
                <?php
                  $pays = array("Allemagne", "Autriche", "Belgique", "Bulgarie", "Chypre", "Croatie", "Danemark", "Espagne", "Estonie", "Finlande", "France", "Grèce", "Hongrie", "Irlande", "Italie", "Lettonie", "Lituanie", "Luxembourg", "Malte", "Norvège", "Pays-Bas", "Pologne", "Portugal",
                                "République-Tchèque", "Roumanie", "Royaume-Uni", "Slovaquie", "Slovénie", "Suède", "Suisse");
                  $select = '<select name="pays_logement" id="pays_logement">';
                  foreach ($pays as $option) {
                    $select .= '<option value="'.$option.'"';
                    if ($option == $my_full_info[1][3]) {
                      $select .= ' selected';
                    }
                    $select .= '>'.$option.'</option>';
                  }
                  $select .= '</select>';
                  echo ($select);
                ?>
              </p>
              <p>
                <label for="superficie"><strong>Superficie (m²) : </strong></label><br/>
                <input type="number" name="superficie" id="superficie" value="<?php echo($my_full_info[1][5]); ?>" min="0" required/>
              </p>
              <p>
                <label for="nb_habitant"><strong>Nombre d'habitants : </strong></label><br/>
                <input type="number" name="nb_habitant" id="nb_habitant" value="<?php echo($my_full_info[1][6]); ?>" min="0" required/>
              </p>
            </div>
          </div>
        </section>
        <div class="paiement_connection_info">
          <section class="paiement_info">
            <div class="content_paiement_info">
              <h3>Informations paiement</h3>
              <div id="child_content_paiement_info">
                <p>
                  <label for="paiement"><strong>Paiement par : </strong></label><br/>
                  <?php
                    $moyen_paiement = array("Prélèvement automatique mensuel", "Prélèvement automatique annuel", "Chèque mensuel", "Chèque annuel");
                    $select = '<select name="paiement" id="paiement">';
                    foreach ($moyen_paiement as $option) {
                      $select .= '<option value="'.$option.'"';
                      if ($option == $my_full_info[2][0]) {
                        $select .= ' selected';
                      }
                      $select .= '>'.$option.'</option>';
                    }
                    $select .= '</select>';
                    echo ($select);
                  ?>
                </p>
              </div>
            </div>
          </section>
          <section class="connection_info">
            <div class="content_connection_info">
              <h3>Informations de connexion</h3>
              <div id="child_content_connection_info">
                <p>
                  <label for="identifiant"><strong>Identifiant : </strong></label><br/>
                  <input type="text" name="identifiant" id="identifiant" value="<?php echo($my_full_info[3][0]); ?>"/>
                </p>
                <p>
                  <label for="ancien_mdp"><strong>Ancien mot de passe : </strong></label><br/>
                  <input type="password" name="ancien_mdp" id="ancien_mdp"/>
                </p>
                <p>
                  <label for="nouveau_mdp"><strong>Nouveau mot de passe : </strong></label><br/>
                  <input type="password" name="nouveau_mdp" id="nouveau_mdp"/>
                </p>
                <p>
                  <label for="conf_mdp"><strong>Confirmez le mot de passe : </strong></label><br/>
                  <input type="password" name="conf_mdp" id="conf_mdp"/>
                </p>
              </div>
            </div>
          </section>
          <section class="button_edit">
            <input type="reset" value="Rafraichir">
            <input type="submit" value="Modifier">
          </section>
        </div>
      </div>
    </div>
  </form>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function form_full_info_admin($my_full_info_admin) {
  ob_start();
  ?>
  <form method="post" action="index.php?cible=admin_info_edit">
    <div class="form">
      <h2>Modifier mes informations administrateur</h2>
      <div class="content_info_admin">
        <section class="admin_info">
          <div class="content_info_admin">
            <h3>Informations administrateur</h3>
            <div id="child_content_info_admin">
              <p>
                <label for="civilite"><strong>Civilité : </strong></label><br/>
                <input type="text" name="civilite" id="civilite" value="<?php echo($my_full_info_admin[0]); ?>" required/>
              </p>
              <p>
                <label for="nom"><strong>Nom : </strong></label><br/>
                <input type="text" name="nom" id="nom" value="<?php echo($my_full_info_admin[1]); ?>" required/>
              </p>
              <p>
                <label for="prenom"><strong>Prénom : </strong></label><br/>
                <input type="text" name="prenom" id="prenom" value="<?php echo($my_full_info_admin[2]); ?>" required/>
              </p>
              <p>
                <label for="date_naissance"><strong>Date de naissance : </strong></label><br/>
                <input type="date" name="date_naissance" id="date_naissance" value="<?php echo($my_full_info_admin[4]); ?>" required/>
              </p>
              <p>
                <label for="nationalite"><strong>Nationalité : </strong></label><br/>
                <input type="text" name="nationalite" id="nationalite" value="<?php echo($my_full_info_admin[5]); ?>" required/>
              </p>
              <p>
                <label for="pays"><strong>Pays : </strong></label><br/>
                <?php
                  $pays = array("Allemagne", "Autriche", "Belgique", "Bulgarie", "Chypre", "Croatie", "Danemark", "Espagne", "Estonie", "Finlande", "France", "Grèce", "Hongrie", "Irlande", "Italie", "Lettonie", "Lituanie", "Luxembourg", "Malte", "Norvège", "Pays-Bas", "Pologne", "Portugal",
                                "République-Tchèque", "Roumanie", "Royaume-Uni", "Slovaquie", "Slovénie", "Suède", "Suisse");
                  $select = '<select name="pays" id="pays">';
                  foreach ($pays as $option) {
                    $select .= '<option value="'.$option.'"';
                    if ($option == $my_full_info_admin[6]) {
                      $select .= ' selected';
                    }
                    $select .= '>'.$option.'</option>';
                  }
                  $select .= '</select>';
                  echo ($select);
                ?>
              </p>
              <p>
                <label for="mail"><strong>E-mail : </strong></label><br/>
                <input type="mail" name="mail" id="mail" value="<?php echo($my_full_info_admin[7]); ?>" required/>
              </p>
              <p>
                <label for="telephone"><strong>Téléphone : </strong></label><br/>
                <input type="tel" name="telephone" id="telephone" maxlength="12" value="<?php echo($my_full_info_admin[8]); ?>" required/>
              </p>
              <p>
                <label for="prenom"><strong>Nombre d'utilisateurs à charge : </strong></label><br/>
                <input type="number" name="nb_user" id="nb_user" value="<?php echo($my_full_info_admin[9]); ?>" required/>
              </p>
            </div>
          </div>
        </section>

        <div class="paiement_connection_info_admin">
          <section class="connection_info_admin">
            <div class="content_connection_info_admin">
              <h3>Informations de connexion administrateur</h3>
              <div id="child_content_connection_info_admin">
                <p>
                  <label for="identifiant"><strong>Identifiant : </strong></label><br/>
                  <input type="text" name="identifiant" id="identifiant" value="<?php echo($my_full_info_admin[3]); ?>"/>
                </p>
                <p>
                  <label for="ancien_mdp"><strong>Ancien mot de passe : </strong></label><br/>
                  <input type="password" name="ancien_mdp" id="ancien_mdp"/>
                </p>
                <p>
                  <label for="nouveau_mdp"><strong>Nouveau mot de passe : </strong></label><br/>
                  <input type="password" name="nouveau_mdp" id="nouveau_mdp"/>
                </p>
                <p>
                  <label for="conf_mdp"><strong>Confirmez le mot de passe : </strong></label><br/>
                  <input type="password" name="conf_mdp" id="conf_mdp"/>
                </p>
              </div>
            </div>
          </section>
          <section class="button_edit_admin">
            <input type="reset" value="Rafraichir">
            <input type="submit" value="Modifier">
          </section>
        </div>
      </div>
    </div>
  </form>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

// fonction gérant l'affichage des informations sur le domicile utilisateur
function my_home_info($info_home) {
  ob_start();
  ?>
  <section class="home_info">
    <div id="content_info_home">
      <h3>Informations du logement</h3>
      <div id="child_content_info_home">
        <p><strong>Adresse : </strong><?php echo($info_home['adresse']); ?></p>
        <p><strong>Code postal : </strong><?php echo($info_home['code_postal']); ?></p>
        <p><strong>Ville : </strong><?php echo($info_home['ville']); ?></p>
        <p><strong>Pays : </strong><?php echo($info_home['pays']); ?></p>
        <p><strong>Nombre de pièces : </strong><?php echo($info_home['nb_piece']); ?></p>
        <p><strong>Superficie : </strong><?php echo($info_home['superficie'].' m²'); ?></p>
        <p><strong>Nombre d'habitants : </strong><?php echo($info_home['nb_habitant']); ?></p>
      </div>
      </div>

    <div id="bouton_info_home"><a href="index.php?cible=info_user"><button>Voir les informations complètes</button></a></div>
  </section>
  <?php
  $home = ob_get_clean();
  return $home;
}

function my_device($my_room) {
  ob_start();
  ?>
  <section class="device_info">
    <div id="content_info_device">
      <h3><?php if(count($my_room) == 2) {
                  echo('Dispositif de la pièce \''.$my_room[0][1].'\'');
                  } else {
                    echo('Dispositifs de la pièce \''.$my_room[0][1].'\'');
                  }?>
      </h3>
      <div id="device_block">
        <?php
        if(count($my_room) == 1) {
          ?>
          <h2 class="except_h2">Cette pièce ne contient pas de dispositifs</h2>
          <?php
        } else {
          for($i = 1; $i < count($my_room); $i++) {
            ?>
            <article>
              <div class="top">
                <h3>
                  <?php echo($my_room[$i][1]); ?>
                </h3>
                <img id="trash" class="trash<?php echo($i);?>" src="views/styles/ressources/icons/trash1.png" title='Supprimer le dispositif'
                onclick="deleteDevice(<?php echo("'".addslashes($my_room[$i][1])."'");?>, <?php echo("'".$my_room[$i][0]."'") ?>, <?php echo("'".addslashes($my_room[0][1])."'"); ?>, <?php echo("'".$my_room[0][0]."'"); ?>)"
                onmouseover="this.src='views/styles/ressources/icons/trash2.png'" onmouseout="this.src='views/styles/ressources/icons/trash1.png'">
              </div>
              <div class="content">
                <p><strong>Numéro de série : </strong><?php echo($my_room[$i][0]); ?></p>
                <p><strong>Etat : </strong><?php echo($my_room[$i][2]); ?></p>
              </div>
              <script type="text/javascript" src="views/scripts/myDevice1.js"></script>
              <a href="index.php?cible=device_info&amp;id_device=<?php echo($my_room[$i][0]); ?>"><button>Données complètes</button></a>
            </article>
            <?php
          }
        }
        ?>
        <form id="form" method="post" action="index.php?cible=device_add&amp;id_piece=<?php echo($my_room[0][0]); ?>">
          <script type="text/javascript" src="views/scripts/myDevice2.js"></script>
      </div>
    </div>
    <div class="bouttons_dispositif">
      <input id="submit" type="submit" value="Confirmer les modifications">
      </form>
      <div class="add_bouttons">
        <button onclick="addDevice()">Ajouter un dispositif</button>
        <button onclick="annuler()">Annuler</button>
      </div>
    </div>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function menu_messaging($titre, $nb_unread_mail) {
  ob_start();
  ?>
  <div class="content">
  <section class="menu_messaging">
    <div class="bloc_menu">
      <h3 id="mailbox"><a href="index.php?cible=messaging">Boite de réception <?php if($nb_unread_mail > 0) {echo('('.$nb_unread_mail.')');} ?></a></h3>
      <h3 id="sentmail"><a href="index.php?cible=sent_mail">Messages envoyés</a></h3>
    </div>
    <?php
    if ($titre == 'Boite de réception' || $titre == 'Messages envoyés') {
      ?>
      <div class="bloc_new_mail">
        <a href="index.php?cible=new_mail"><button>Nouveau message</button></a>
      </div>
      <?php
    } elseif ($titre == 'Nouveau message' || $titre == 'Message') {
      ?>
      <div class="bloc_previous_page">
        <a href="index.php?cible=messaging"><button>Page précédente</button></a>
      </div>
      <?php
    }

    if ($titre == 'Boite de réception') {
      ?>
      <div class="bloc_action">
        <h3>Actions</h3>
        <ul>
          <form method="post" action="index.php?cible=mail_traitement">
          <li><input type="submit" name="submit" value="Marquer comme lu" class="button_space"></li>
          <li><input type="submit" name="submit" value="Marquer comme non lu" class="button_space"></li>
          <li><input type="submit" name="submit" value="Supprimer" onclick="return confirmation()"></li>
        </ul>
        <script type="text/javascript" src="views/scripts/mailDel.js"></script>
      </div>
      <?php
    } elseif ($titre == 'Messages envoyés') {
      ?>
      <div class="bloc_action">
        <h3>Actions</h3>
        <ul>
          <form method="post" action="index.php?cible=mail_traitement">
          <li><input type="submit" name="submit" value="Supprimer" onclick="return confirmation()"></li>
        </ul>
        <script type="text/javascript" src="views/scripts/mailDel.js"></script>
      </div>
      <?php
    }
    ?>
  </section>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function mailbox($mails, $nb_page) {
  ob_start();
  ?>
  <section class="mailbox">
    <div class="content_mailbox">
      <div class="mail_top">
        <h3>Boite de réception</h3>
      </div>
      <div class="mail">
        <?php
        if ($mails == array()) {
          echo('<h2 class="except_h2">Vous n\'avez reçu aucun e-mail.</h2>');
        } else {
          ?>
          <table>
            <?php
            for ($i = 0; $i < count($mails); $i++) {
              ?>
              <tbody>
                <?php
                if ($mails[$i][5] == "oui") {
                  ?>
                  <tr class="read">
                  <?php
                } else {
                  ?>
                  <tr class="unread">
                  <?php
                }
                ?>
                  <td><input type="checkbox" name="<?php echo($mails[$i][4]);?>"></td>
                  <td><?php echo('De : '.$mails[$i][0]); ?></td>
                  <td><?php echo($mails[$i][1]); ?></td>
                  <td><a href="index.php?cible=answer_mail&amp;id_mail=<?php echo($mails[$i][4]);?>"><strong><?php echo($mails[$i][2]); ?></strong></a></td>
                  <td><?php echo($mails[$i][3]); ?></td>
                  <td><img id="edit" class="edit<?php echo($mails[$i][4]);?>" src="views/styles/ressources/icons/pen1.png" title="Répondre"
                  onclick="printMail(<?php echo($mails[$i][4]);?>)"
                  onmouseover="this.src='views/styles/ressources/icons/pen2.png'" onmouseout="this.src='views/styles/ressources/icons/pen1.png'"></td></td>
                  <td><img id="trash" class="trash<?php echo($mails[$i][4]);?>" src="views/styles/ressources/icons/trash1.png" title="Supprimer l'e-mail"
                  onclick="deleteMail(<?php echo($mails[$i][4]);?>, 'reception')"
                  onmouseover="this.src='views/styles/ressources/icons/trash2.png'" onmouseout="this.src='views/styles/ressources/icons/trash1.png'"></td>
                  <script type="text/javascript" src="views/scripts/mailbox.js"></script>
              <?php
              if ($i != count($mails) - 1) {
                ?>
                </tr></tbody>
                <tbody><tr class="tr_vide"></tr></tbody>
                <?php
              }  else {
                echo('</tr></tbody>');
              }
            }
          }
          ?>
        </table>
      </div>
    </div>
    <div class="mail_bottom">
      <?php
      if ($nb_page > 1) {
        echo('Page : ');
        for ($i = 1; $i <= $nb_page; $i++) {
          ?>
          <a href="index.php?cible=messaging&amp;page=<?php echo($i); ?>"><?php echo($i); ?></a>
          <?php
          echo(' ');
        }
      }
      ?>
    </div>
  </section>
  </form>
  </div>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function sent_mail($mails, $nb_page) {
  ob_start();
  ?>
  <section class="mailbox">
    <div class="content_mailbox">
      <div class="mail_top">
        <h3>Messages envoyés</h3>
      </div>
      <div class="mail">
        <?php
        if ($mails == array()) {
          echo('<h2 class="except_h2">Vous n\'avez envoyé aucun e-mail.</h2>');
        } else {
          ?>
          <table>
            <?php
            for ($i = 0; $i < count($mails); $i++) {
              ?>

              <tbody>
                <tr class="read">
                  <td><input type="checkbox" name="<?php echo($mails[$i][4]);?>"></td>
                  <td><?php echo('À : '.$mails[$i][0]); ?></td>
                  <td><?php echo($mails[$i][1]); ?></td>
                  <td><a href="index.php?cible=answer_mail&amp;id_mail=<?php echo($mails[$i][4]);?>&amp;previous=envoyes"><strong><?php echo($mails[$i][2]); ?></strong></a></td>
                  <td><?php echo($mails[$i][3]); ?></td>
                  <td><img id="trash" class="trash<?php echo($mails[$i][4]);?>" src="views/styles/ressources/icons/trash1.png" title="Supprimer l'e-mail"
                  onclick="deleteMail(<?php echo($mails[$i][4]);?>, 'envoyés')"
                  onmouseover="this.src='views/styles/ressources/icons/trash2.png'" onmouseout="this.src='views/styles/ressources/icons/trash1.png'"></td>
                  <script type="text/javascript" src="views/scripts/mailbox.js"></script>
              <?php
              if ($i != count($mails) - 1) {
                ?>
                </tr></tbody>
                <tbody><tr class="tr_vide"></tr></tbody>
                <?php
              } else {
                echo('</tr></tbody>');
              }
            }
          }
            ?>
          </table>
      </div>
    </div>
    <div class="mail_bottom">
      <?php
      if ($nb_page > 1) {
        echo('Page : ');
        for ($i = 1; $i <= $nb_page; $i++) {
          ?>
          <a href="index.php?cible=sent_mail&amp;page=<?php echo($i); ?>"><?php echo($i); ?></a>
          <?php
          echo(' ');
        }
      }
      ?>
    </div>
  </section>
  </form>
  </div>
  <?php
  $contenu = ob_get_clean();
  return $contenu;
}

function new_mail($titre, $info_mail) {
  ob_start();
  if (isset($info_mail[0][3]) && $info_mail[0][3] == "Service client") {
    ?>
    <section class="new_mail">
      <h3>Répondre au message</h3>
      <h3 class="except_h2">Le message ci-contre a été envoyé automatiquement, vous ne pouvez donc pas y répondre. Pour tout renseignement, contacter un administrateur.</h3>
    </section>
    <?php
  } else {
  ?>
    <section class="new_mail">
      <h3>
        <?php
        if ($titre == 'Message') {
          echo("Répondre au message");
        } else {
          echo($titre);
        }
        ?>
      </h3>
      <form method="post" action="index.php?cible=contr_new_mail" >
        <div class="bloc_destinataire">
          <p>
            <label for="mail_receveur"><strong>E-mail du destinataire :</strong></label><br/>
            <?php
            if ($titre == "Nouveau message") {
              ?>
              <input type="mail" name="mail_receveur" id="mail_receveur" placeholder="exemple@mail.com" required value="<?php if(isset($_POST['mail_receveur'])) {echo($_POST['mail_receveur']);}?>">
              <?php
            } elseif ($titre == "Message") {
              ?>
              <input type="text" id="mail_receveur" disabled value="<?php echo($info_mail[0][4]);?>">
              <input type="text" name="mail_receveur" id="mail_receveur_none" value="<?php echo($info_mail[0][4]);?>">
              <?php
            }
            ?>
          </p>
          <p>
            <label for="type_receveur"><strong>Type de destinataire :</strong></label><br/>
            <select name="type_receveur" id="type_receveur" required>
            <?php
            if ($titre == "Nouveau message") {
              ?>
                <option value="" selected disabled>-- Sélectionnez une valeur --</option>
                <option value="utilisateur">Utilisateur</option>
                <option value="administrateur">Administrateur</option>
              <?php
            } elseif ($titre == "Message") {
              if ($info_mail[0][3] == "Utilisateur") {
              ?>
              <option value="" disabled>-- Sélectionnez une valeur --</option>
              <option value="utilisateur" selected>Utilisateur</option>
              <option value="administrateur" disabled>Administrateur</option>
              <?php
            } elseif ($info_mail[0][3] == "Administrateur") {
              ?>
              <option value="" disabled>-- Sélectionnez une valeur --</option>
              <option value="utilisateur" disabled>Utilisateur</option>
              <option value="administrateur" selected>Administrateur</option>
              <?php
              }
            }
            ?>
            </select>
          </p>
        </div>
        <div class="bloc_contenu">
          <p>
            <label for="objet"><strong>Objet :</strong></label><br/>
            <?php
            if ($titre == "Nouveau message") {
              ?>
              <input type="text" name="objet" id="objet" placeholder="Objet du message" required value="<?php if(isset($_POST['objet'])) {echo($_POST['objet']);}?>">
              <?php
            } elseif ($titre == "Message") {
              if (substr($info_mail[1][2], 0, 5) != "RE : ") {
                $objet_mail = 'RE : '.$info_mail[1][2];
                ?>
                <input type="text" name="objet" id="objet" placeholder="Objet du message" disabled value="<?php echo($objet_mail);?>">
                <input type="text" name="objet" id="objet_none" value="<?php echo($objet_mail);?>">
                <?php
              } else {
                ?>
                <input type="text" name="objet" id="objet" placeholder="Objet du message" disabled value="<?php echo($info_mail[1][2]);?>">
                <input type="text" name="objet" id="objet_none" value="<?php echo($info_mail[1][2]);?>">
                <?php
              }
            }
            ?>
          </p>
          <p>
            <label for="contenu"><strong>Contenu :</strong></label><br />
            <textarea name="contenu" id="contenu" placeholder="Contenu du message" required><?php if(isset($_POST['contenu'])) {echo($_POST['contenu']);}?></textarea>
          </p>
        </div>
        <p class="button">
          <input type="submit" value="Envoyer">
        </p>
      </form>
    </section>
  </div>
  <?php
  }
  $content = ob_get_clean();
  return $content;
}

function mail_print($info_mail) {
  ob_start();
  ?>
  <section class="mail">
    <h3>Message</h3>
    <div class="bloc_expediteur">
      <p>
        <label for="expediteur"><strong>Expéditeur :</strong></label><br/>
        <input type="text" id="expediteur" value="<?php echo($info_mail[0][0].' '.$info_mail[0][1].' '.$info_mail[0][2]); ?>" disabled>
      </p>
      <p>
        <label for="type_expediteur"><strong>Type d'expéditeur :</strong></label><br/>
        <input type="text" id="type_expediteur" value="<?php echo($info_mail[0][3]); ?>" disabled>
      </p>
    </div>
    <div class="bloc_mail_date">
      <p>
        <label for="mail_expediteur"><strong>E-mail de l'expéditeur :</strong></label><br/>
        <input type="text" id="mail_expediteur" value="<?php echo($info_mail[0][4]); ?>" disabled>
      </p>
      <p>
        <label for="date_envoi"><strong>Date d'envoi :</strong></label><br/>
        <input type="text" id="date_envoi" value="<?php echo('Le '.$info_mail[1][0].' à '.$info_mail[1][1]); ?>" disabled>
      </p>
    </div>
    <div class="bloc_objet">
      <p>
        <label for="objet"><strong>Objet :</strong></label><br/>
        <input type="text" id="objet" value="<?php echo($info_mail[1][2]); ?>" disabled>
      </p>
    </div>
    <div class="bloc_contenu">
      <p>
        <label for="contenu"><strong>Contenu :</strong></label><br/>
        <textarea id="contenu" disabled><?php echo($info_mail[1][3]); ?></textarea>
      </p>
    </div>
  </section>
  <?php
  $content = ob_get_clean();
  return $content;
}

/*****************************************************************Fonctions $footer***********************************************************************/
function footer() {
  ob_start();
	?>
	<ul class="footer">
    <ul class="fo_ul">
		  <li class="footer_elements">Localisation</li>
		  <li class="footer_elements"><a href="https://www.google.fr/maps/place/ISEP/@48.8243885,2.2765791,16.25z/data=!4m5!3m4!1s0x47e670797ea4730d:0xe0d3eb2ad501cb27!8m2!3d48.824529!4d2.2798536" target="_blank"><img class="map" src="views/styles/ressources/images/map_isep.png" alt="Map rue de Vanves"  title="Cliquez ici pour afficher dans Google Maps" /></a></li>
    </ul>

    <ul class="fo_ul">
		  <li class="footer_elements"><p><a class="lien" href="index.php?cible=legal_information">Mentions légales</a>
      <br><img class="paiement" src="views/styles/ressources/icons/paiement.png" alt="Paiement" height="40px" width="170px" /></br></li>
    </ul>

    <ul class="fo_ul">
		  <li class="footer_elements">Contact</li>
		  <li class="footer_elements">+33 1 23 45 67 89</li>
		  <li class="footer_elements"> accueil@ehome.com</li>
    </ul>
	</ul>
	<?php
  $footer = ob_get_clean();
  return $footer;
}

function footer_s() {
  ob_start();
	?>

	<ul class="footer_s">
    <h3 class="footer_s_text"> Suivez-nous sur les réseaux sociaux ! </h3>
    <div class="flex_footer_s">
      <li><a href="https://www.facebook.com/" target="_blank"><img class="facebook" src="views/styles/ressources/icons/facebook.png" alt="Icon Facebook"  title="Cliquez ici pour accéder à notre page Facebook" /></a></li>
      <li><a href="https://www.instagram.com/?hl=fr" target="_blank"><img class="instagram" src="views/styles/ressources/icons/Instagram.png" alt="Icon Instagram"  title="Cliquez ici pour accéder à notre page Instagram" /></a></li>
      <li><a href="https://twitter.com/?lang=fr" target="_blank"><img class="twitter" src="views/styles/ressources/icons/twitter.png" alt="Icon Twitter"  title="Cliquez ici pour accéder à notre page Twitter" /></a></li>
      <li><a href="https://fr.linkedin.com/" target="_blank"><img class="linkedin" src="views/styles/ressources/icons/linkedin.png" alt="Icon Linkedin"  title="Cliquez ici pour accéder à notre page Linkedin" /></a></li>
      <li><a href="https://www.youtube.com/" target="_blank"><img class="youtube" src="views/styles/ressources/icons/youtube.png" alt="Icon Youtube"  title="Cliquez ici pour accéder à notre chaîne Youtube" /></a></li>
    </div>
	</ul>
	<?php
  $footer = ob_get_clean();
  return $footer;
}

/*****************************************************************Fonctions JavaScript***********************************************************************/

function carroussel_home() {
  ob_start();
  ?>
  <div id="slider">
      <div id="imgs">
          <!-- here you have to add the img tag -->
          <img id="Img3" src="views/styles/ressources/images/c3.jpg"/>
          <img id="Img2" src="views/styles/ressources/images/c2.jpg"/>
          <img id="Img1" src="views/styles/ressources/images/c1.jpg"/>
      </div>
      <!--Here is going to be the left right buttons, the info and the imgs shown-->
      <div id="Snav">
          <!-- here is the circles , showes the current img -->
          <div id="SnavUp">
              <div id="Scircles">
                  <ul>
                      <!-- here you have to add the li tag-->
                      <li id="S0"></li>
                      <li id="S1"></li>
                      <li id="S2"></li>
                  </ul>
              </div>
          </div>
          <!-- the left and right button -->
          <div id="SnavMiddle">
              <img id="Sleft" src="views/styles/ressources/images/left.png" onclick="prev()"/>
              <img id="Sright" src="views/styles/ressources/images/right.png" onclick="next()"/>
          </div>
          <!-- the info -->
          <div id="SnavBottom">
              <p id="SP0">⋆⋆⋆⋆⋆<br><i>"Tout simplement époustouflant" </i><br><br> -Paulette</p>
              <p id="SP1">⋆⋆⋆⋆<br><i>"Mécanicien très tchatcheur"</i><br><br>-Jacqueline</p>
              <p id="SP2">⋆⋆⋆⋆⋆<br><i>"Des possibilités quasisment infinies, merci eHome" </i><br><br> -Tony</p>
          </div>
      </div>
  </div>

  <?php
  $contenu = ob_get_clean();
  return $contenu;
}
