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
    public function get_clases($num_doc,$name_doc){
        $sql="SELECT class.id, class.code, names, surname,class.status, subject FROM user 
        INNER JOIN surrogate_keys.document ON user.documentid = document.id 
        INNER JOIN user_class ON user_class.Userid = user.id 
        INNER JOIN class ON class.id = user_class.Classid 
        WHERE num_doc = $num_doc AND acronym_doc = '$name_doc';";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->clases[] = $row;
        }
        return $this->clases;
    }
    //Añadir clases
    public function insertar($random,$materia){

        $resultado = $this->db->prepare("INSERT INTO class(code, subject, status) 
        VALUES ('$random','$materia','Activo')");;
        $resultado->execute();
    }
    //Se añade el id a partir del código de la clase
    public function get_id($random){
        $resultado = $this->db->prepare("SELECT MIN(class.id) as id_class FROM surrogate_keys.class WHERE code = $random");
        $resultado->execute();
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $class_id = $row['id_class'];
        return $class_id;
    }    
    public function insertar_user_class($id_user,$class_id){
        $resultado = $this->db->prepare("INSERT INTO user_class(Userid, classid) 
        VALUES ('$id_user',$class_id)");
            $resultado->execute();
    }
    //Consulta para modificar
    public function modificar($materia,$status,$id){
			
        $sql="UPDATE class SET subject='$materia',status='$status' WHERE id=$id";	
        $resultado = $this->db->prepare($sql);
        $resultado->execute();	
    }
    //Update 2
    //Delete
    public function eliminar($id){
			
        $sql="DELETE FROM class WHERE id=$id";	
        $resultado = $this->db->prepare($sql);
        $resultado->execute();	
    }
        //Obtener datos para modificar
        public function get_clase($id)
        {
            $sql = "SELECT class.id, class.code, course.code as ficha, names, surname, subject FROM user 
            INNER JOIN surrogate_keys.document ON user.documentid = document.id 
            INNER JOIN user_class ON user_class.Userid = user.id 
            INNER JOIN class ON class.id = user_class.Classid
            INNER JOIN surrogate_keys.course_class ON course_class.id_class= class.id
            INNER JOIN surrogate_keys.course ON course.id = course_class.id_course
            WHERE class.id = $id;";
            $resultado = $this->db->prepare($sql);
            $resultado->execute();
            $row = $resultado->fetch(PDO::FETCH_ASSOC);
    
            return $row;
        }
            //Eliminar usuario clase
    public function del_user_class($id){
        $sql="DELETE user_class 
        FROM user_class WHERE user_class.Userid = $id";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
    }
    //Cargar información en clases estudiante
    public function info_class_std($course){
        $sql="SELECT names, surname,`class`.`code`,class.id, program_name FROM surrogate_keys.user  
        INNER JOIN surrogate_keys.document ON user.documentid = document.id 
        INNER JOIN surrogate_keys.user_class ON user_class.Userid = user.id 
        INNER JOIN surrogate_keys.class ON user_class.classid = class.id 
        INNER JOIN surrogate_keys.course_class ON class.id= course_class.id_class
        INNER JOIN surrogate_keys.course ON course_class.id_course = course.id
        INNER JOIN surrogate_keys.mode ON course.Modeid = mode.id  
        WHERE `course`.`code`=$course;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->clases[] = $row;
        }
        return $this->clases;
    }
}
?>