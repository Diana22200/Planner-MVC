<?php
class UsuariosController{
    public function __construct(){
        session_start();
        require_once "models/UsuariosModel.php";
    }
    public function index(){
        $usuarios = new Usuarios_model();
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
        $data["perfiles"] = $usuarios->get_perfiles($num_doc,$name_doc);

        require_once "views/usuarios/perfil_admin.php";
    }
    public function get_perfil(){
    require_once "views/usuarios/usuarios.php";
    }
}
?>