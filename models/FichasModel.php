<?php
class Fichas_model{
    private $db;
    public function __construct(){
        $db = new Database();
        $this->db =$db->connect();
    }
    //Traer el id de la ficha de acuerdo al código de ficha
    public function get_id($ficha){
        $sql="SELECT MIN(id) as id_f FROM course WHERE code=$ficha";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $id_ficha = $row['id_f'];
        return $id_ficha;
    }
    public function insertar_course_class($class_id,$id_ficha){
        $resultado = $this->db->prepare("INSERT INTO course_class(id_class, id_course) 
        VALUES ($class_id,'$id_ficha')");
            $resultado->execute();
    }
}
?>