<?php
class Usuarios_model{
    public function __construct(){
        $db = new Database();
        $this->db =$db->connect();
    }
    public function get_usuarios($num_doc,$name_doc){
        $sql="SELECT MIN(user.id) as id_us FROM surrogate_keys.user 
        INNER JOIN surrogate_keys.document ON user.documentid = document.id WHERE num_doc = $num_doc AND acronym_doc = '$name_doc'";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $id_user = $row['id_us'];
        return $id_user;
    }
}
?>