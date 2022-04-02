<?php
require_once "config/database.php";
require_once "controllers/actividad_Controller.php";

$control = new actividad_Controller();
$control->clase_1_actividad();
?>