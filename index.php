<?php
/*
fichier principal dirigeant l'utilisateur vers différentes pages en fonction de ses choix
*/

session_start();
require("views/commun.php");
require("modeles/db_access.php");

if (isset($_SESSION['type'])) {

/*********************************************************PARTIE USER*********************************************************************/
  if ($_SESSION['type'] == 'user') {
    if(isset($_GET['cible'])) {
      if ($_GET['cible'] == 'home') {
        include 'views/home.php';
      } elseif ($_GET['cible'] == 'about-us') {
        include('views/about-us.php');
      } elseif ($_GET['cible'] == 'products') {
        include('views/products.php');
      } elseif ($_GET['cible'] == 'connect') {
        include("views/home_user.php");
      } elseif ($_GET['cible'] == 'disconnect') {
        include('controlers/disconnect.php');
      } elseif ($_GET['cible'] == 'sensors') {
        include("views/sensors.php");
      } elseif ($_GET['cible'] == 'actuators') {
        include("views/actuators.php");
      } elseif ($_GET['cible'] == 'cameras') {
        include("views/cameras.php");
      } elseif ($_GET['cible'] == 'legal_information') {
        include("views/legal_information.php");
      }


      elseif ($_GET['cible'] == 'home_user') {
        include("controlers/home_user.php");
      } elseif ($_GET['cible'] == 'home_management') {
        include("controlers/home_management.php");
      } /*elseif ($_GET['cible'] == 'notif_user') {
        include("views/notif_user.php");
      } elseif ($_GET['cible'] == 'info_user') {
        include("views/info_user.php");
      }elseif ($_GET['cible'] == 'subcription_user') {
        include("views/subcription_user.php");
      } elseif ($_GET['cible'] == 'messaging_user') {
        include('views/messaging_user.php');
      } */elseif ($_GET['cible'] == 'room_add') {
        include('controlers/room_add.php');
      } elseif ($_GET['cible'] == 'room_del') {
        include('controlers/room_del.php');
      } /*elseif ($_GET['cible'] == 'room_upd') {
        include('controlers/room_upd.php');
      } */

      elseif ($_GET['cible'] == 'device_management') {
        include('controlers/device_management.php');
      } elseif ($_GET['cible'] == 'device_add') {
        include('controlers/device_add.php');
      } elseif ($_GET['cible'] == 'device_del') {
        include('controlers/device_del.php');
      } else {
        include ('views/error.php');
      }
    } else {
      include ('views/error.php');
    }
  }

/*********************************************************PARTIE ADMIN*********************************************************************/
  elseif ($_SESSION['type'] == 'admin') {
    if(isset($_GET['cible'])) {
      if ($_GET['cible'] == 'home') {
        include 'views/home.php';
      } elseif ($_GET['cible'] == 'about-us') {
        include('views/about-us.php');
      } elseif ($_GET['cible'] == 'products') {
        include('views/products.php');
      } elseif ($_GET['cible'] == 'connect') {
        include("views/home_admin.php");
      } elseif ($_GET['cible'] == 'disconnect') {
        include('controlers/disconnect.php');
      } elseif ($_GET['cible'] == 'sensors') {
        include("views/sensors.php");
      } elseif ($_GET['cible'] == 'actuators') {
        include("views/actuators.php");
      } elseif ($_GET['cible'] == 'cameras') {
        include("views/cameras.php");
      } elseif ($_GET['cible'] == 'legal_information') {
        include("views/legal_information.php");
      }elseif ($_GET['cible'] == 'user_management') {
        include("views/user_management.php");
      }elseif ($_GET['cible'] == 'notif_ad') {
        include("views/notif_ad.php");
      }elseif ($_GET['cible'] == 'security') {
        include("views/security.php");
      }elseif ($_GET['cible'] == 'messaging_ad') {
        include("views/messaging_ad.php");
      }

      elseif ($_GET['cible'] == 'home_admin') {
        include("controlers/home_admin.php");
      } else {
        include ('views/error.php');
      }
    } else {
      include ('views/home.php');
    }
  }
}

/*********************************************************PARTIE VISITEUR*********************************************************************/
else {
  if(isset($_GET['cible'])) {
    if ($_GET['cible'] == 'home') {
      include 'views/home.php';
    } elseif ($_GET['cible'] == 'about-us') {
      include('views/about-us.php');
    } elseif ($_GET['cible'] == 'products') {
      include('views/products.php');
    } elseif ($_GET['cible'] == 'join-us_type') {
      include('views/join-us_type.php');
    } elseif ($_GET['cible'] == 'join-us_user') {
      include('views/join-us_user.php');
    } elseif ($_GET['cible'] == 'join-us_admin') {
      include('views/join-us_admin.php');
    } elseif($_GET['cible'] == 'join-us_success') {
      include('views/join-us_success.php');
    } elseif ($_GET['cible'] == 'signin') {
      include("views/signin.php");
    } elseif ($_GET['cible'] == 'connexion_request') {
      include('controlers/signin.php');
    } elseif ($_GET['cible'] == 'form_subscribe_user') {
      include('controlers/subscribe_user.php');
    } elseif ($_GET['cible'] == 'subscribe_admin') {
      include('controlers/subscribe_admin.php');
    } elseif ($_GET['cible'] == 'sensor_choice') {
      include('controlers/sensor_choice.php');
    } elseif ($_GET['cible'] == 'sensors') {
      include("views/sensors.php");
    } elseif ($_GET['cible'] == 'actuators') {
      include("views/actuators.php");
    } elseif ($_GET['cible'] == 'cameras') {
      include("views/cameras.php");
    } elseif ($_GET['cible'] == 'legal_information') {
      include("views/legal_information.php");
    } else {
      include ('views/error.php');
    }
  } else {
    include ('views/home.php');
  }
}
