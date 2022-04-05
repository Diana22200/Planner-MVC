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
    //Trae la información visual de modificar calificacion
    public function actividad_calf($id){
        $actividades = new Actividades_Model();
       
        $data["actividad_calf"] = $actividades->get_actividad_calf($id);
        
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
    //Calificar
    public function calificar(){
        $score=$_POST['score'];
        //id de califación
        $id=$_POST['id_calificacion'];
        $actividades = new Actividades_model();
        $actividades->calificar($score,$id);
        echo"<script>alert('Se añadió la calificación correctamente'); window.history.go(-1);</script>";
    }
    // public function fn_modif_act($id){
    //     require_once "models/actividad_Model.php";
    //     $actividad_mod_fun = new actividad_Model();
    //     $data["modificar_actividad"] = $actividad_mod_fun->get_modificar_actividad($id);
    //     require_once "views/actividades/modificar_actividad.php";
    // }
    //Eliminar
    public function eliminar($id){
        $actividades = new Actividades_model();
        $actividades->eliminar_nota($id);
        $actividades->eliminar_act($id);
        echo"<script>alert('Se eliminó la calificación correctamente'); window.history.go(-1);</script>";
    }
        //Carga los datos del cronograma general de instructor
        public function get_cronograma_inst(){
            $administrar_actividad = new Actividades_Model();
            $usuarios = new Usuarios_model();
            $num_doc = $_SESSION['numero_docu'];
            $name_doc = $_SESSION['tipo_docu'];
            $user_id = $usuarios->get_usuarios($num_doc,$name_doc);
            $data["actividad_administrar"] = $administrar_actividad->get_cron_inst($user_id);
            
            require_once "views/actividades/Cronograma_inst.php";
        }
        //Llevar a la visualizacion de actividades y traer los datos
        public function get_act_std($id){
            $actividades = new Actividades_model();
            $usuarios = new Usuarios_model();
            $num_doc = $_SESSION['numero_docu'];
            $name_doc = $_SESSION['tipo_docu'];
             //Traer el id del usuario
            $us_id=$usuarios->get_usuarios($num_doc,$name_doc);
            $class_id = $id;
            $data["id"] = $id;
            $data["actividades"] = $actividades->get_cron_class_stu($class_id,$us_id);
            require_once "views/actividades/visualiza_act.php";
        }
}
?>