<?php
class mensaje_enviado_Controller{
    public function enviado(){
        require_once "models/mensaje_enviado_Model.php";
        $mensaje_enviado = new mensaje_enviado_Model();
        $data["mensaje_enviado"] = $mensaje_enviado->get_mensaje_enviado();

        require_once "views/mensajes/mensaje_enviado.php";
    }
    public function recibido(){
        require_once "models/mensaje_enviado_Model.php";
        $mensaje_recibido = new mensaje_enviado_Model();
        $data["mensaje_recibido"] = $mensaje_recibido->get_mensaje_recibido();

        require_once "views/mensajes/mensaje_recibido.php";
    }
    public function enviar_mensaje(){
        require_once "models/mensaje_enviado_Model.php";
        $enviar_mensaje = new enviar_mensaje();
        $data["enviar_mensaje"] = $enviar_mensaje->ins_enviar_mensaje();
        require_once "views/mensajes/Enviar_mensaje.php";
    }
}
?>