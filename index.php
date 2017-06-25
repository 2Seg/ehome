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
      } elseif ($_GET['cible'] == 'info_user') {
        include("controlers/info_user.php");
      } elseif ($_GET['cible'] == 'info_edit') {
        include("controlers/info_edit.php");
      } elseif ($_GET['cible'] == 'notif_user') {
        include("controlers/notif_user.php");
      } elseif ($_GET['cible'] == 'messaging') {
        include('controlers/messaging.php');
      } elseif ($_GET['cible'] == 'sent_mail') {
        include('controlers/sent_mail.php');
      } elseif ($_GET['cible'] == 'new_mail') {
        include('controlers/new_mail.php');
      } elseif ($_GET['cible'] == 'contr_new_mail') {
        include('controlers/contr_new_mail.php');
      } elseif ($_GET['cible'] == 'mail_traitement') {
        include('controlers/mail_traitement.php');
      } elseif ($_GET['cible'] == 'answer_mail') {
        include('controlers/answer_mail.php');
      }

      elseif ($_GET['cible'] == 'device_management') {
        include('controlers/device_management.php');
      } elseif ($_GET['cible'] == 'device_add') {
        include('controlers/device_add.php');
      } elseif ($_GET['cible'] == 'device_del') {
        include('controlers/device_del.php');
      } elseif ($_GET['cible'] == 'room_add') {
        include('controlers/room_add.php');
      } elseif ($_GET['cible'] == 'room_del') {
        include('controlers/room_del.php');
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
      } elseif ($_GET['cible'] == 'user_management') {
        include("controlers/user_management.php");
      } elseif ($_GET['cible'] == 'info_admin') {
        include("controlers/info_admin.php");
      } elseif ($_GET['cible'] == 'admin_info_edit') {
        include("controlers/admin_info_edit.php");
      } elseif ($_GET['cible'] == 'gestion_user') {
        include("controlers/gestion_user.php");
      } elseif ($_GET['cible'] == 'user_suppression') {
        include("controlers/user_suppression.php");
      } elseif ($_GET['cible'] == 'notification') {
        include("views/notification.php");
      } elseif ($_GET['cible'] == 'security') {
        include("views/security.php");
      }

      elseif ($_GET['cible'] == 'messaging') {
        include('controlers/messaging.php');
      } elseif ($_GET['cible'] == 'sent_mail') {
        include('controlers/sent_mail.php');
      } elseif ($_GET['cible'] == 'new_mail') {
        include('controlers/new_mail.php');
      } elseif ($_GET['cible'] == 'contr_new_mail') {
        include('controlers/contr_new_mail.php');
      } elseif ($_GET['cible'] == 'mail_traitement') {
        include('controlers/mail_traitement.php');
      } elseif ($_GET['cible'] == 'answer_mail') {
        include('controlers/answer_mail.php');
      } elseif ($_GET['cible'] == 'home_admin') {
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
