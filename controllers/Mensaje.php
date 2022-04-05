<?php
class MensajeController{
    public function __construct(){
        session_start();
        require_once "models/MensajesModel.php";
        require_once "models/UsuariosModel.php";
    }
    public function enviado(){
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
        $mensaje_enviado = new Mensaje_model();
        $usuarios = new Usuarios_model();
        $user_id = $usuarios->get_usuarios($num_doc,$name_doc);
        $data["mensaje_enviado"] = $mensaje_enviado->get_mensaje_enviado($user_id);

        require_once "views/mensajes/mensaje_enviado.php";
    }
    public function recibido(){
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
        $mensaje_recibido = new Mensaje_model();
        $usuarios = new Usuarios_model();
        $user_id = $usuarios->get_usuarios($num_doc,$name_doc);
        $data["mensaje_recibido"] = $mensaje_recibido->get_mensaje_recibido($user_id);

        require_once "views/mensajes/mensaje_recibido.php";
    }
    public function mensajes_envio(){
        $text=$_POST['text'];
        $title=$_POST['title'];
        $code = (RAND()*(99999-10000)+1);
        $mensajes = new Mensaje_model();
        $mensajes->insertar_mensaje($code, $title, $text);
        echo"<script>alert('Se envió el mensaje!'); window.history.go(-2);</script>";

    }
    public function elim_mensaje_enviado(){
        require_once "models/mensaje_enviado_Model.php";
        $enviar_mensaje->eliminar_mensaje_enviado();
        require_once "views/mensajes/mensaje_enviado.php";
    }
    public function elim_mensaje_recibido(){
        require_once "models/mensaje_enviado_Model.php";
        $enviar_mensaje->eliminar_mensaje_recibido();
        require_once "views/mensajes/mensaje_recibido.php";
    }
    public function message(){
        require_once "views/mensajes/Enviar_mensaje.php";
    }
}
?>