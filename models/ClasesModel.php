<?php
class Clases_model{
    private $db;
    private $clases;
    public function __construct(){
        $db = new Database();
        $this->db =$db->connect();
        $this->clases = array();
    }
    //Mostrar clases
    public function get_clases(){
/*         $sql="SELECT class.id, class.code, names, surname,class.status, subject FROM user 
        INNER JOIN surrogate_keys.document ON user.documentid = document.id 
        INNER JOIN user_class ON user_class.Userid = user.id 
        INNER JOIN class ON class.id = user_class.Classid 
        WHERE num_doc = $num_doc AND acronym_doc = '$name_doc';"; */
        $sql="SELECT class.id, class.code, names, surname,class.status, subject FROM user 
        INNER JOIN surrogate_keys.document ON user.documentid = document.id 
        INNER JOIN user_class ON user_class.Userid = user.id 
        INNER JOIN class ON class.id = user_class.Classid;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->clases[] = $row;
        }
        return $this->clases;
    }
    //Añadir clases
    public function insertar($num_doc,$name_doc, $materia, $ficha){
        $random=rand(1000,9999); 
/*         //Traer el id de la ficha
        $resultado = $this->db->prepare("SELECT MIN(id) as id_f FROM course WHERE code=$ficha");
        $resultado->execute();
        $id_ficha =$dato['id_f'];
        //Traer el id del usuario
        $resultado = $this->db->prepare("SELECT MIN(id) as id_f FROM course WHERE code=$ficha");
        $resultado->execute();
        $id_ficha =$dato['id_us'];
        //Insertar
        $resultado = $this->db->prepare("SELECT MIN(id) as id_f FROM course WHERE code=$ficha");
        $resultado->execute();
        $id_ficha =$dato['id_us']; */
    }
    
}
?>