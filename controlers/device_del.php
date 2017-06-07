<?php
/*
controleur gérant la suppression de dispositifs
*/

include_once('modeles/functions.php');

delete_device($bdd, $_GET['id_device']);

include("controlers/device_management.php");
