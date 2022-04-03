<?php
class Actividades_model{
    private $db;
    private $actividades;

    public function __construct(){
        $db = new Database();
        $this->db =$db->connect();
        $this->actividades = array();
    }
    //filtra las actividades para administrar
    public function show_act_inst($user_id,$code){
        $sql="SELECT `activity`.`id`,
        `activity`.`code`,
        `activity`.`deadline`,
        `activity`.`title`,   
        `activity`.`status`
        FROM `surrogate_keys`.`activity`
        INNER JOIN `class` ON `class`.`id` =`activity`.classid
        INNER JOIN `user_class` ON `user_class`.classid=`class`.`id`
        INNER JOIN `user` ON `user`.id=`user_class`.Userid
        WHERE`user`.`id`=$user_id AND `class`.`id`=$code;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->actividades[] = $row;
        }
        return $this->actividades;
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
    //Mostrar información de administrar actividades
    public function get_actividad_adm($user_id,$id){
        $sql="SELECT `activity`.`id`,
        user.names,
            `activity`.`code`,
                `activity`.`deadline`,
            `activity`.`title`,   
            `activity`.`status`
        FROM `surrogate_keys`.`activity`
        INNER JOIN `surrogate_keys`.`class` ON `class`.`id` =`activity`.classid
        INNER JOIN `surrogate_keys`.`user_class` ON `user_class`.`classid` =`class`.`id`
        INNER JOIN `surrogate_keys`.`user` ON `user`.id =`user_class`.Userid 
        WHERE user.id=$user_id AND class.id=$id";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->actividades[] = $row;
        }
        return $this->actividades;
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
    // 

    //obtener los datos para modificar
    public function get_modificar_actividad($id_class){
        $sql="SELECT activity.code, description, deadline, 
        title, activity.status, activity.id,class.id as id_class, link 
        FROM activity
        INNER JOIN `surrogate_keys`.`class` ON `class`.`id` =`activity`.classid
        WHERE activity.id = $id_class;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        
        return $row;
    }
    //Modificar actividad
    public function modificar($title,$description,$deadline,$link,$id,$status,$tipo){
        $sql="UPDATE surrogate_keys.activity 
        SET title = '$title', 
        description = '$description', 
        deadline = '$deadline',
        `type` = '$tipo',
         link = '$link',
        `status` = '$status'
        WHERE id = $id";	
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
    }
}
?>