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

//cargar información de Calificar
    public function get_actividad_calf($id){
        $sql="SELECT user.names,
        user.surname,
        `activity`.`title`,
       /*Traerlo como hidden */ 
       `qualification`.`id`,
        `qualification`.`score`
    FROM `surrogate_keys`.`qualification`
    INNER JOIN `user` ON `user`.id = qualification.Userid
    INNER JOIN activity ON activity.id = qualification.Activityid
        WHERE activity.id = $id ;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->actividades[] = $row;
        }
        return $this->actividades;
    }
    //calificar model
    public function calificar($score,$id){
        $sql="UPDATE `surrogate_keys`.`qualification`
        SET
        `score` = $score
        WHERE `id` = $id";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
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
    //Agregar actividad
    public function agregar($code, $title, $description, $type, $deadline, $status, $link, $classid){
    $sql="INSERT INTO `surrogate_keys`.`activity`
        (`code`,
        `title`,
        `description`,
        `type`,
        `deadline`,
        `status`,
        `link`,
        `classid`)
        VALUES
        (
        $code,
        '$title',
        '$description',
        '$type',
        '$deadline',
        '$status',
        '$link',
        $classid);";
      $resultado = $this->db->prepare($sql);
      $resultado->execute();
    }
}
?>