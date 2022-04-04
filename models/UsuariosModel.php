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
        //Obtener la información de los usuarios para eliminar y modificar
        public function get_usuario_adm(){
            $sql="SELECT acronym_doc, num_doc, names, surname, user.id, type 
            FROM user INNER JOIN document ON user.documentid = document.id 
            INNER JOIN surrogate_keys.role ON role.id = user.Roleid";
            $resultado = $this->db->prepare($sql);
            $resultado->execute();
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                $this->perfiles[] = $row;
            }
            return $this->perfiles;
        }
        //Modificar usuario desde administrador
        public function modificar($num_doc,$id_doc,$status,$names,$surname,$id){
            $sql="UPDATE surrogate_keys.user 
            SET num_doc = $num_doc, documentid = $id_doc, 
            status = '$status', names = '$names', 
            surname = '$surname' WHERE id = $id";
            $resultado = $this->db->prepare($sql);
            $resultado->execute();
        }
        //Registrar administrador
        public function registrar($num_doc,$id_doc,$name, $surname,$email,$password,$roleid){
            $resultado = $this->db->prepare("INSERT INTO surrogate_keys.user(num_doc,documentid,status,names,surname,url_prof_pic,email,password,Roleid)
            VALUES ('$num_doc', $id_doc, 'Activo', '$name', '$surname',
            'https://www.onusanmiguel.com/wp-content/uploads/2021/04/unnamed.jpg'
            , '$email', '$password', '3')");
                $resultado->execute();
        }
        public function eliminar_us($id){

            $sql="DELETE FROM `surrogate_keys`.`user`
            WHERE id = $id";
            $resultado = $this->db->prepare($sql);
            $resultado->execute();
        }
}
?>