<?php
class actividad_Controller{
    public function actividad_calf(){
        require_once "models/actividad_Model.php";
        $actividad_get = new actividad_Model();
        $data["actividad_calf"] = $actividad_get->get_actividad_calf();
        
        require_once "views/actividades/Calificar_actividad.php";
    }
    public function actividad_adm(){
        require_once "models/actividad_Model.php";
        $administrar_actividad = new actividad_Model();
        $data["actividad_administrar"] = $administrar_actividad->get_actividad_adm();
        
        require_once "views/actividades/Administrar_actividad.php";
    }
}
?>