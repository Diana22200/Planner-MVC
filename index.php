<?php
require_once "config/config.php";
require_once "core/routes.php";
require_once "config/database.php";
require_once "controllers/Clases.php";

if(isset($_GET['c'])){
    $controlador = cargarControlador($_GET['c']);
    if(isset($_GET['a'])){
        if(isset($_GET['id'])){
        cargarAccion($controlador, $_GET['a'], $_GET['id']);
    }else{
        cargarAccion($controlador, ACCION_PRINCIPAL);
    }
    
}else{
    //En caso de que no exista el controlador ingresado se irá a esta página
    $controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
    $accionTmp = ACCION_PRINCIPAL;
    $controlador->$accionTmp();
}
}
?>