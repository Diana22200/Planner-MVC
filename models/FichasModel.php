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
    //Inserta a course_class
    public function insertar_course_class($class_id,$id_ficha){
        $resultado = $this->db->prepare("INSERT INTO course_class(id_class, id_course) 
        VALUES ($class_id,'$id_ficha')");
            $resultado->execute();
    }
    //Trae el id de class_course
    public function aniadir_course_class($id_ficha_ac,$id){
        $resultado = $this->db->prepare("SELECT MIN(id) as id_cc 
        FROM course_class WHERE id_course=$id_ficha_ac AND id_class=$id");
        $resultado->execute();
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $id_cc = $row['id_cc'];
        return $id_cc;
    }
    //Actualizar el class_course
    public function actualizar_class_course($id_ficha,$id_cc){
        $mod_us_class="UPDATE `course_class` SET `id_course`='$id_ficha' WHERE id=$id_cc";
        $resultado = $db->connect()->prepare($mod_us_class);    
        $resultado->execute();
    }
    //Eliminar ficha cuando se elimina el usuario{
        public function del_ficha_us($id){

            $sql="DELETE user_course 
            FROM user_course WHERE user_course.Userid = $id";
            $resultado = $this->db->prepare($sql);
            $resultado->execute();
    }
    //Sacar la ficha de la clase de estudiante
    public function ficha_class_std($num_doc,$name_doc){
        $sql="SELECT course.code as code_course FROM user 
        INNER JOIN surrogate_keys.document 
        ON user.documentid = document.id 
        INNER JOIN user_course 
        ON user_course.Userid = user.id 
        INNER JOIN course 
        ON course.id = user_course.Courseid 
        WHERE num_doc = $num_doc 
        AND acronym_doc = '$name_doc';";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $code_course = $row['code_course'];
        return $code_course;
    }
}
?>