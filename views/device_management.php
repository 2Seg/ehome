<?php
/*
vue gérant l'affichage de la page "Gestion des dispositifs"
*/
// //$my_room = array(array(1, "Salon"),
//                 array(1, "Capteur de luminosité", "off"),
//                 array(2, "Capteur de température", "off"),
//                 array(3, "Capteur de luminosité", "off"),
//                 array(5, "Caméra", "off"),
//                 array(6, "Détecteur de fumée", "off"),
//                 array(9, "Actionneur chauffage", "off"));

//$my_room = array(array(1, "Salon"));

//print_r($my_room);

$titre = 'Gestion des dispositifs de la pièce \''.$my_room[0][1].'\'';

$menu = menu();
$menu .= menu_user($_SESSION['type']);

$contenu = my_device($my_room);

$footer = footer();

if(isset($message)) {
  ?>
  <script type="text/javascript">
    alert("<?php echo($message); ?>");
  </script>
  <?php
}

include('gabarit.php');
