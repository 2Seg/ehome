<?php
/*
vue gérant l'affichage de la page "Mes informations"
*/

$titre = "Mes informations";

$menu = menu();
$menu .= menu_user($_SESSION['type']);

// $my_full_info = array(array("Monsieur", "de Séguier", "Eliott", "20/06/1995", "Française", "France", "eliottdes@gmail.com", "0663670680"),
//                       array("69 rue Balard", "75015", "Paris", "France", 8, 98, 6),
//                       array("Prélévement automatique mensuel"),
//                       array("eliottdes"));
//print_r($my_full_info);

$contenu = my_full_info($my_full_info);

$footer = footer();

if(isset($message)) {
  ?>
  <script type="text/javascript">
    alert("<?php echo($message); ?>");
  </script>
  <?php
}

include('gabarit.php');
