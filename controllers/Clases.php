<?php
class ClasesController{
    public function __construct(){
        session_start();
        require_once "models/ClasesModel.php";
        require_once "models/UsuariosModel.php";
        require_once "models/FichasModel.php";
    }
    public function index(){
        $clases = new Clases_model();
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
        $data["clases"] = $clases->get_clases($num_doc,$name_doc);

        require_once "views/clases/clases.php";
    }
    public function nuevo(){
        require_once "views/clases/clases_nueva.php";
    }
/*     public function actual(){
        require_once "views/clases/clases_modifica.php";
    } */
    public function agregar(){

    //Variables globales de sesión
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
    //variables traidas por formulario
        $materia = $_POST['materia'];
        $ficha = $_POST['course'];
        //clases
        $fichas= new Fichas_model();
        $usuarios = new Usuarios_model();
        $clases = new Clases_model();

        //Variable de número al azar
        $random=rand(1000,9999);      

        //Sentencias
        $db = new Database();

        //Traer el id de la ficha
        $id_ficha=$fichas->get_id($ficha);
        
        //Traer el id del usuario
        $id_user=$usuarios->get_usuarios($num_doc,$name_doc);

        //Insertar  
        $clases->insertar($random,$materia);

        //Tomar el id de la clase
        $class_id = $clases->get_id($random);

        //insertar a user_class
        $clases->insertar_user_class($id_user,$class_id);

        //Insertar a course_class
        $fichas->insertar_course_class($class_id,$id_ficha);
  
    echo"<script>alert('Se Añadió la clase correctamente'); window.history.go(-2);</script>";
    echo"<script>alert('Algo salió mal. Por favor intente de nuevo'); window.history.go(-1);</script>";
    }
    //obtener los datos de modificar    
    public function show_modificar($id){
        $clases = new Clases_model();
			
        $data["id"] = $id;
        $data["clases"] = $clases->get_clase($id);
        require_once "views/clases/clases_modifica.php";
    }

    //Modificar clase
    public function modificar(){
        include_once ("database.php");
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
        $materia = $_POST['materia'];
        $ficha = $_POST['ficha'];
        $ficha_actu = $_POST['ficha_actu'];
        $status = $_POST['status'];
        $id =$_POST['id'];
        //clases
        $fichas= new Fichas_model();
        $usuarios = new Usuarios_model();
        $clases = new Clases_model();
        //trae la base de datos
        $db = new Database();
        //Traer el id de la ficha nueva
        $id_ficha=$fichas->get_id($ficha);
        //Traer el id de la ficha actual
        $id_ficha=$fichas->get_id($ficha_actu);
        //Traer el id de class_course
        $id_ficha=$fichas->aniadir_course_class($id_ficha_ac,$id);
        //modificación de Clase
        $clases->modificar($materia,$status,$id);
        //Actualizar el class_course
        $fichas->actualizar_class_course($id_ficha,$id_cc);
        if($query){
            echo"<script>alert('Se modifico la clase correctamente'); window.history.go(-2);</script>";
        }else{
            echo"<script>alert('No se pudo modificar la clase.'); window.history.go(-1);</script>";
        }
            }
}
?>