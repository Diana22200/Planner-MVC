<?php
require_once "config/database.php";
require_once "controllers/Clases.php";

$control = new ClasesController();
$control->index();
?>