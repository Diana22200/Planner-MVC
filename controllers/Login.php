<?php
class LoginController{

    public function __construct(){
        require_once "models/LoginModel.php";
        require_once "models/UsuariosModel.php";
    }
      /**
     * Inicializa la sesión
     */

	public function index(){
        require_once "views/login/login.php";
        session_start();
        if(isset($_GET['cerrar_sesion'])){
            session_unset();
            
        session_destroy();
        header('location:index.php?c=login&a=index');
        }
        if(isset($_SESSION['rol'])){
            switch($_SESSION['rol']){
                //administrador
                case 1:
                    header('location:index.php?c=usuarios&a=index');
                break;
                //Aprendiz
                case 2:
                    header('location:index.php?c=usuarios&a=vaprendiz');
        
                break;
                //Instructor
                case 3:
                    header('location:index.php?c=usuarios&a=vinstructor');
                break;
                default:

            }
        }
        
        if(isset($_POST['tipo_doc']) && isset($_POST['num_doc'])&& isset($_POST['password'])){

            $tipo_doc = $_POST['tipo_doc'];
            $num_doc = $_POST['num_doc'];
            $password = $_POST['password'];
            $model = new Login_Model();
            $row= $model->signIn($tipo_doc, $num_doc, $password);
            if($row == true){
                $rol = $row[9];
                $_SESSION['rol']=$rol;
                
                switch($_SESSION['rol']){
                    //administrador
                    case 1:
                        header('location:index.php?c=usuarios&a=index');
                    break;
                    //Aprendiz
                    case 2:
                        header('location:index.php?c=usuarios&a=vaprendiz');
            
                    break;
                    //Instructor
                    case 3:
                        header('location:index.php?c=usuarios&a=vinstructor');
                    break;
                    default:
                }
            //Valida el inicio de sesión
            }else{
                echo "<script> alert('No se pudo ingresar. Por favor verifique los datos');</script>";
            }
        }
    }
    //Registro
    public function registro(){
        $usuarios = new Usuarios_model();

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $roleid = $_POST['Roleid'];
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
            $model = new Login_Model();
            $model->registrar($num_doc,$id_doc,$name, $surname,$email,$password,$roleid);                  echo"<script>alert('Se creó el usuario correctamente'); window.history.go(-1);</script>";
            echo"<script>alert('Se creó el usuario correctamente'); window.history.go(-2);</script>";
        }else{
            echo"<script>alert('Las contraseñas no coinciden'); window.history.go(-1);</script>";
        }
    }
    public function registrarse(){
        require_once "views/login/registrarse.php";
    }
}
?>