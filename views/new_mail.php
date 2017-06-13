<?php
/*
vue gérant l'affichage de la page "Nouveau message" de l'utilisateur
*/

$titre = 'Nouveau message';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = menu_messaging($titre);
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
