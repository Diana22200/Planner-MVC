<?php
class mensaje_enviado_model{
    private $db;
    private $mensaje_enviado;

    public function __construct(){
        $db = new Database();
        $this->db =$db->connect();
        $this->mensaje_enviado = array();
    }
    public function get_mensaje_enviado(){
        $sql="SELECT s.Userid, m.shipping_date, m.title, s.situation FROM message m 
        JOIN user_message s ON s.messageid = m.id 
        JOIN user u ON u.id = Userid 
        WHERE s.situation = 'Enviado' AND s.Userid = 1;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->mensaje_enviado[] = $row;
        }
        return $this->mensaje_enviado;
    }
    public function get_mensaje_recibido(){
        $sql="SELECT s.Userid, m.shipping_date, m.title, s.situation FROM message m 
        JOIN user_message s ON s.messageid = m.id 
        JOIN user u ON u.id = Userid 
        WHERE s.situation = 'Recibido' AND s.Userid = 1;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->mensaje_recibido[] = $row;
        }
        return $this->mensaje_recibido;
    }
    public function insertar_mensaje($text, $title){
			
        $resultado = $this->db->query("INSERT INTO `message` (`id`, `text`, `shipping_date`, `title`, `code`)
         VALUES (NULL, $text, current_timestamp(), $title, RAND()*(99999 - 00000)+1);");
        
    }
}
?>