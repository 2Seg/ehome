<?php
/*
vue gérant l'affichage de la page "Accueil"
*/

$titre = 'Vos informations administrateur';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = content_info_admin($info_admin);

$footer = footer();

if(isset($message)) {
  ?>
  <script type="text/javascript">
    alert("<?php echo($message); ?>");
  </script>
  <?php
}

include('gabarit.php');
?>
