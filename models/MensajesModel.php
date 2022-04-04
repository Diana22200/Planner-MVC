<?php
class Mensaje_model{
    private $mensaje_enviado;
    private $db;

    public function __construct(){
        $db = new Database();
        $this->db =$db->connect();
        $this->mensaje_recibido = array();
    }
    public function get_mensaje_enviado($user_id){
        $sql="SELECT s.Userid, m.shipping_date, m.title, m.text, s.situation FROM message m 
        JOIN user_message s ON s.messageid = m.id 
        JOIN user u ON u.id = s.Userid 
        WHERE s.situation = 'Enviado' AND s.Userid = $user_id;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->mensaje_recibido[] = $row;
        }
        return $this->mensaje_recibido;
    }
    public function get_mensaje_recibido($user_id){
        $sql="SELECT s.Userid, m.shipping_date, m.title, m.text, s.situation FROM message m 
        JOIN user_message s ON s.messageid = m.id 
        JOIN user u ON u.id = s.Userid 
        WHERE s.situation = 'Recibido' AND s.Userid = $user_id;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->mensaje_recibido[] = $row;
        }
        return $this->mensaje_recibido;
    }
    public function insertar_mensaje($text, $title){
			
        $sql ="INSERT INTO `message` (`id`, `text`, `shipping_date`, `title`, `code`)
         VALUES (NULL, $text, current_timestamp(), $title, RAND()*(99999 - 00000)+1);";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        
        return $row;
    }
    public function eliminar_mensaje_enviado(){
			
        $resultado = $this->db->query("INSERT INTO `message` (`id`, `text`, `shipping_date`, `title`, `code`)
         VALUES (NULL, $text, current_timestamp(), $title, RAND()*(99999 - 00000)+1);");
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
    }
    public function eliminar_mensaje_recibido(){
			
        $resultado = $this->db->query("INSERT INTO `message` (`id`, `text`, `shipping_date`, `title`, `code`)
         VALUES (NULL, $text, current_timestamp(), $title, RAND()*(99999 - 00000)+1);");
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
    }
}
?>