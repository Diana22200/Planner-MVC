<?php
class ActividadesController{
    
    public function __construct(){
        session_start();
        require_once "models/ActividadesModel.php";
        require_once "models/UsuariosModel.php";
        require_once "models/FichasModel.php";
    }

    public function index($id){
        
        $actividades = new Actividades_model();
        $usuarios = new Usuarios_model();
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
         //Traer el id del usuario
        $user_id=$usuarios->get_usuarios($num_doc,$name_doc);
        $data["id"] = $id;
        $data["actividades"] = $actividades->show_act_inst($user_id,$id);
            require_once "views/actividades/Clase_1.php";
    }

    public function actividad_calf($id){
        $actividad_get = new Actividades_Model();
        $data["actividad_calf"] = $actividad_get->get_actividad_calf();
        
        require_once "views/actividades/Calificar_actividad.php";
    }
    //Carga los datos de administrar actividad
    public function actividad_adm($id){
        $administrar_actividad = new Actividades_Model();
        $usuarios = new Usuarios_model();
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
        $user_id = $usuarios->get_usuarios($num_doc,$name_doc);
        $data["id"] = $id;
        $data["actividad_administrar"] = $administrar_actividad->get_actividad_adm($user_id,$id);
        
        require_once "views/actividades/Administrar_actividad.php";
    }
    public function clase_1_actividad(){
        $clase_act = new Actividades_Model();
        $data["clase_1"] = $clase_act->get_clase_actividad();
        
        require_once "views/actividades/Clase_1.php";
    }
    //Lleva a añadir actividad
    public function anadir_act($id){  
        $data["id"] = $id;
        require_once "views/actividades/añadir_actividad.php";
    }
    //Añade la actividad
    public function anadir(){
        $code=rand(1000,9999);
        $title=$_POST['title'];
        $description=$_POST['description'];
        $type=$_POST['type'];
        $deadline=$_POST['deadline'];
        $status=$_POST['status'];
        $link=$_POST['link'];
        $classid=$_POST['classid'];
        $actividades = new Actividades_model();
        $actividades->agregar($code, $title, $description, $type, $deadline, $status, $link, $classid);
        echo"<script>alert('Se Añadió la clase correctamente'); window.history.go(-2);</script>";
    }
    //obtener los datos de modificar    
    public function show_modificar($id){
        $actividades = new Actividades_model();
        
        $data["id"] = $id;
        $data["actividades"] = $actividades->get_modificar_actividad($id);
        require_once "views/actividades/modificar_actividad.php";
    }
    //añadir
    public function modificar(){
        $actividades = new Actividades_model();
        $description = $_POST['description'];
        $deadline = $_POST['deadline'];
        $status = $_POST['status'];
        $title = $_POST['title'];
        $id =$_POST['id'];
        $link = $_POST['link'];
        $tipo=$_POST['type'];
        $actividades->modificar($title,$description,$deadline,$link,$id,$status,$tipo);

            echo"<script>alert('Se modifico la actividad correctamente'); window.history.go(-2);</script>";
    }
    // public function fn_modif_act($id){
    //     require_once "models/actividad_Model.php";
    //     $actividad_mod_fun = new actividad_Model();
    //     $data["modificar_actividad"] = $actividad_mod_fun->get_modificar_actividad($id);
    //     require_once "views/actividades/modificar_actividad.php";
    // }

}
?>