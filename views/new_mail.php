<?php
/*
vue gérant l'affichage de la page "Nouveau message" de l'utilisateur
*/

$titre = 'Nouveau message';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

if ($_SESSION['type'] == 'user') {
  $nb_unread_mail = count_nb_unread_mail($bdd, select_mail_user($bdd, $_SESSION['id']));
} else {
  $nb_unread_mail = count_nb_unread_mail($bdd, select_mail_admin($bdd, $_SESSION['id']));
}

$contenu = menu_messaging($titre, $nb_unread_mail);
$contenu .= new_mail($titre, array());

$footer = footer();

if(isset($message)) {
  ?>
  <script type="text/javascript">
    alert("<?php echo($message); ?>");
  </script>
  <?php
}

include('gabarit.php');
