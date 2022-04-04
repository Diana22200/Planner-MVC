<?php
class UsuariosController{
    public function __construct(){
        session_start();
        require_once "models/ActividadesModel.php";
        require_once "models/UsuariosModel.php";
        require_once "models/MensajesModel.php";
        require_once "models/ClasesModel.php";
        require_once "models/FichasModel.php";

    }
    public function index(){
        $usuarios = new Usuarios_model();
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
        $data["perfiles"] = $usuarios->get_perfiles($num_doc,$name_doc);

        require_once "views/usuarios/perfil_admin.php";
    }
    public function vinstructor(){
        $usuarios = new Usuarios_model();
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
        $data["perfiles"] = $usuarios->get_perfiles($num_doc,$name_doc);

        require_once "views/usuarios/perfil_instructor.php";
    }
    public function vaprendiz(){
        $usuarios = new Usuarios_model();
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
        $data["perfiles"] = $usuarios->get_perfiles($num_doc,$name_doc);

        require_once "views/usuarios/perfil_estu.php";
    }
    
    public function get_usuarios(){
    require_once "views/usuarios/usuarios.php";
    }
    //obtener información de administrar usuarios
    public function get_usuario_adm(){
        $data["perfiles"] = $usuarios->get_usuario_adm();
        require_once "views/usuarios/perfil_estu.php";
    }
    //Obtener información modificar usuario
    public function get_us_adm_mod($id){
        $data["id"] = $id;
        $data["perfiles"] = $usuarios->get_usuario_adm();
        require_once "views/usuarios/usuarios_modifica.php";
    }
    //Modificar usuario
    public function modificar(){
        //falta type
        $names = $_POST['names'];
        $surname = $_POST['surname'];
        $tipo_doc = $_POST['acronym_doc'];
        $status = $_POST['status'];
        $num_doc = $_POST['num_doc'];
        $id =$_POST['id'];
        
        //Conseguir id del documento
        $usuarios = new Usuarios_model();
        $id_doc =$usuarios->get_id_doc($tipo_doc);

        //Modificar usuario
        $id_doc =$usuarios->modificar($num_doc,$id_doc,$status,$names,$surname,$id);
        
            echo"<script>alert('Se modifico el usuario correctamente'); window.history.go(-2);</script>";

    }
    //Eliminar usuario
    public function eliminar($id){
        $usuarios = new Usuarios_model();
        $mensajes = new Mensaje_model();
        $clases = new Clases_model();
        $fichas= new Fichas_model();
        $actividades = new Actividades_model();

        //Eliminar usuario_mensaje
        $mensajes->del_us_msg($id);
        //Eliminar clase
        $clases->del_user_class($id);

         //Eliminar Ficha
         $clases->del_ficha_us($id);

        //Eliminar calificaciones
        $actividades->eliminar_nota_us($id);
        //Eliminar usuario
        $usuarios->eliminar_us($id);
    
        echo"<script>alert('Se eliminó el usuario correctamente'); window.history.go(-1);</script>";
    }
    //Registrar admin
     //Registro
     public function registro(){
        $usuarios = new Usuarios_model();

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $tipo_doc = $_POST['tipo_doc'];
        $num_doc = $_POST['num_doc'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_two = $_POST['password_two'];
        $id_doc = "";
        //Verificar que las contraseñas coincida
        if($password == $password_two){
            //traer documento de documento
        $id_doc=$usuarios->get_id_doc($tipo_doc);
        //Insertar
            $login = new Login_Model();
            $login->registrar($num_doc,$id_doc,$name, $surname,$email,$password,3);                  
            echo"<script>alert('Se creó el administrador correctamente'); window.history.go(-2);</script>";
        }else{
            echo"<script>alert('Las contraseñas no coinciden'); window.history.go(-1);</script>";
        }
        //Lleva a la página para llenar el formulario de registro de administrador
        public function registrar(){
            require_once "views/usuarios/crear_admin.php";
        }
}
?>