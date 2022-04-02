<?php
class LoginController{

    public function __construct(){
        require_once "models/LoginModel.php";
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
            echo "<script> alert('ENTRÓ');</script>";

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
}
?>