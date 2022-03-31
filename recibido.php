<?php
require_once "config/database.php";
require_once "controllers/mensaje_enviado_Controller.php";

$control = new mensaje_enviado_Controller();
$control->recibido();
?>