<?php
class Usuarios_model{
    private $perfiles;
    private $db;
    public function __construct(){
        $db = new Database();
        $this->db =$db->connect();
        $this->perfiles = array();
    }

    //obtener el id
    public function get_usuarios($num_doc,$name_doc){
        $sql="SELECT MIN(user.id) as id_us FROM surrogate_keys.user 
        INNER JOIN surrogate_keys.document ON user.documentid = document.id WHERE num_doc = $num_doc AND acronym_doc = '$name_doc'";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $id_user = $row['id_us'];
        return $id_user;
    }
    //sacar datos en general
    public function get_perfiles($num_doc,$name_doc){
        $sql="SELECT names, surname, email, url_prof_pic FROM surrogate_keys.user 
        INNER JOIN surrogate_keys.document ON user.documentid = document.id WHERE
         num_doc = $num_doc AND acronym_doc = '$name_doc'";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->perfiles[] = $row;
        }
        return $this->perfiles;
    }
        //obtener el id de documento
        public function get_id_doc($tipo_doc){
            $sql="SELECT MIN(document.id) as id_do FROM surrogate_keys.document WHERE acronym_doc= '$tipo_doc'";
            $resultado = $this->db->prepare($sql);
            $resultado->execute();
            $row = $resultado->fetch(PDO::FETCH_ASSOC);
            $id_doc = $row['id_do'];
            return $id_doc;
        }
}
?>