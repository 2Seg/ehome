<?php
/*
fichier principal dirigeant l'utilisateur vers différentes pages en fonction de ses choix
*/

session_start();
require("views/commun.php");
require("modeles/db_access.php");

if (isset($_SESSION['type'])) {
  // visiteur connecté
  if ($_SESSION['type'] == 'user') {
    // user connecté
    if(isset($_GET['cible'])) {
      if ($_GET['cible'] == 'home') {
        include 'views/home.php';
      } elseif ($_GET['cible'] == 'about-us') {
        include('views/about-us.php');
      } elseif ($_GET['cible'] == 'products') {
        include('views/products.php');
      } elseif ($_GET['cible'] == 'disconnect') {
        include('controlers/disconnect.php');
      } elseif ($_GET['cible'] == 'sensor_choice') {
        include('controlers/sensor_choice.php');
      } elseif ($_GET['cible'] == 'sensors') {
        include("views/sensors.php");
      } elseif ($_GET['cible'] == 'actuators') {
        include("views/actuators.php");
      } elseif ($_GET['cible'] == 'cameras') {
        include("views/cameras.php");
      }  elseif ($_GET['cible'] == 'connect') {
        include("views/home_user.php");
      }

      elseif ($_GET['cible'] == 'home_user') {
        include("views/home_user.php");
      } elseif ($_GET['cible'] == 'home_management') {
        include("controlers/home_management.php");
      } elseif ($_GET['cible'] == 'notif_user') {
        include("views/notif_user.php");
      } elseif ($_GET['cible'] == 'info_user') {
        include("views/info_user.php");
      } elseif ($_GET['cible'] == 'subcription_user') {
        include("views/subcription_user.php");
      } elseif ($_GET['cible'] == 'messaging_user') {
        include('views/messaging_user.php');
      } else {
        include ('views/error.php');
      }
    } else {
      include ('views/home_user.php');
    }
  } elseif ($_SESSION['type'] == 'admin') {
    // admin connecté

  } else {
    if(isset($_GET['cible'])) {
      if ($_GET['cible'] == 'home') {
        include 'views/home.php';
      } elseif ($_GET['cible'] == 'about-us') {
        include('views/about-us.php');
      } elseif ($_GET['cible'] == 'products') {
        include('views/products.php');
      } elseif ($_GET['cible'] == 'join-us') {
        include('views/join-us.php');
      } elseif($_GET['cible'] == 'join-us_success') {
        include('views/join-us_success.php');
      } elseif ($_GET['cible'] == 'signin') {
        include("views/signin.php");
      } elseif ($_GET['cible'] == 'connect') {
        include('controlers/signin.php');
      } elseif ($_GET['cible'] == 'subscribe') {
        include('controlers/subscribe.php');
      } elseif ($_GET['cible'] == 'sensor_choice') {
        include('controlers/sensor_choice.php');
      } elseif ($_GET['cible'] == 'sensors') {
        include("views/sensors.php");
      } elseif ($_GET['cible'] == 'actuators') {
        include("views/actuators.php");
      } elseif ($_GET['cible'] == 'cameras') {
        include("views/cameras.php");
      } else {
        include ('views/error.php');
      }
    } else {
      include ('views/home.php');
    }
  }
} else {
  if(isset($_GET['cible'])) {
    if ($_GET['cible'] == 'home') {
      include 'views/home.php';
    } elseif ($_GET['cible'] == 'about-us') {
      include('views/about-us.php');
    } elseif ($_GET['cible'] == 'products') {
      include('views/products.php');
    } elseif ($_GET['cible'] == 'join-us') {
      include('views/join-us.php');
    } elseif($_GET['cible'] == 'join-us_success') {
      include('views/join-us_success.php');
    } elseif ($_GET['cible'] == 'signin') {
      include("views/signin.php");
    } elseif ($_GET['cible'] == 'connect') {
      include('controlers/signin.php');
    } elseif ($_GET['cible'] == 'subscribe') {
      include('controlers/subscribe.php');
    } elseif ($_GET['cible'] == 'sensor_choice') {
      include('controlers/sensor_choice.php');
    } elseif ($_GET['cible'] == 'sensors') {
      include("views/sensors.php");
    } elseif ($_GET['cible'] == 'actuators') {
      include("views/actuators.php");
    } elseif ($_GET['cible'] == 'cameras') {
      include("views/cameras.php");
    } else {
      include ('views/error.php');
    }
  } else {
    include ('views/home.php');
  }
}
