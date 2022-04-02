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
    public function clase_1_actividad(){
        require_once "models/actividad_Model.php";
        $clase_act = new actividad_Model();
        $data["clase_1"] = $clase_act->get_clase_actividad();
        
        require_once "views/actividades/Clase_1.php";
    }
    public function añadir_act(){
        require_once "models/actividad_Model.php";
        
        require_once "views/actividades/añadir_actividad.php";
    }
    public function tb_modif_acti(){
        require_once "models/actividad_Model.php";
        $actividad_mod_get = new actividad_Model();
        $data["modificar_actividad"] = $actividad_mod_get->get_modificar_actividad();
        
        require_once "views/actividades/modificar_actividad.php";
    }
    // public function fn_modif_act($id){
    //     require_once "models/actividad_Model.php";
    //     $actividad_mod_fun = new actividad_Model();
    //     $data["modificar_actividad"] = $actividad_mod_fun->get_modificar_actividad($id);
    //     require_once "views/actividades/modificar_actividad.php";
    // }

}
?>