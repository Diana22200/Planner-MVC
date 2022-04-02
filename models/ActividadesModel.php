<?php
class Actividades_model{
    private $db;
    private $actividad;

    public function __construct(){
        $db = new Database();
        $this->db =$db->connect();
        $this->actividad = array();
    }

    public function get_actividad_calf(){
        $id="3";
        $sql="SELECT activity.title, user.names, user.surname, qualification.score 
        FROM surrogate_keys.user 
        INNER JOIN user_course ON user_course.Userid=user.id 
        INNER JOIN course ON user_course.Courseid=course.id 
        INNER JOIN qualification ON qualification.Userid=user.id 
        INNER JOIN activity ON activity.id=qualification.Activityid 
        WHERE course.code = 2251585 AND user.id = $id;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->actividad[] = $row;
        }
        return $this->actividad;
    }
    public function get_actividad_adm(){
        $sql="SELECT code, deadline, title, status, id FROM activity";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->actividad[] = $row;
        }
        return $this->actividad;
    }
    public function get_clase_actividad(){
        $sql="SELECT deadline, title, status, score FROM `activity` 
        INNER JOIN qualification on activity.id=qualification.id;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->actividad[] = $row;
        }
        return $this->actividad;
    }
    // public function up_modificar_actividad($envio){
    //     $id="3";
    //     $sql="UPDATE surrogate_keys.activity SET 
    //     title = '$title', description = '$description', deadline = '$deadline', link = '$link' 
    //     WHERE id = $id";
    //     $resultado = $this->db->prepare($sql);
    //     $resultado->execute();
    // }
    public function get_modificar_actividad(){
        $id_class="3";
        $sql="SELECT code, description, deadline, title, status, id, link FROM activity
        WHERE activity.id = $id_class;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->actividad[] = $fila;
        }
        return $this->actividad;
    }
}
?>