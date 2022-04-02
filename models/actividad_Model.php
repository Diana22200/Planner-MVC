<?php
class actividad_Model{
    private $db;
    private $actividad;

    public function __construct(){
        $db = new Database();
        $this->db =$db->connect();
        $this->actividad = array();
    }

    public function get_actividad_calf(){
        $sql="SELECT q.Userid, q.Activityid, u.names, u.surname, q.score 
        FROM qualification q JOIN user u ON u.id = q.Userid ORDER BY q.Userid ASC;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->actividad[] = $row;
        }
        return $this->actividad;
    }
    public function get_actividad_adm(){
        $sql="SELECT code, deadline, title, status, id FROM activity;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->actividad[] = $row;
        }
        return $this->actividad;
    }
}
?>