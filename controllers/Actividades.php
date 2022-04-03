<?php
class ActividadesController{
    
    public function __construct(){
        session_start();
        require_once "models/ActividadesModel.php";
        require_once "models/UsuariosModel.php";
        require_once "models/FichasModel.php";
    }
    public function index($id){
        
        $clases = new Actividades_model();
        $usuarios = new Usuarios_model();
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
         //Traer el id del usuario
        $user_id=$usuarios->get_usuarios($num_doc,$name_doc);
        $data["id"] = $id;
        $data["actividades"] = $clases->show_act_inst($user_id,$id);
            require_once "views/actividades/Clase_1.php";
    }


    
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