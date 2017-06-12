<?php
/*
vue gérant l'affichage de la page "Nouveau message" de l'utilisateur
*/

$titre = 'Nouveau message';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = new_mail();

$footer = footer();

if(isset($message)) {
  ?>
  <script type="text/javascript">
    alert("<?php echo($message); ?>");
  </script>
  <?php
}

include('gabarit.php');
