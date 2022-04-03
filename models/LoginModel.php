<?php
class Login_model{
    private $db;

    public function __construct(){
        $db = new Database();
        $this->db =$db->connect();
        $this->cuentas = array();
    }
	public function signIn($tipo_doc, $num_doc, $password){
            $_SESSION['numero_docu']=$num_doc;
            $_SESSION['tipo_docu'] =$tipo_doc;
        $resultado = $this->db->prepare('SELECT * FROM user 
        INNER JOIN document ON user.documentid = document.id 
        INNER JOIN role ON role.id = user.Roleid 
        WHERE user.num_doc = :num_doc AND user.password = :password AND document.acronym_doc = :tipo_doc ');
        $resultado->execute(['tipo_doc' => $tipo_doc, 'num_doc' => $num_doc, 'password' => $password]);
        $row = $resultado->fetch(PDO::FETCH_NUM);
        return $row;

            }
    public function registrar($num_doc,$id_doc,$name, $surname,$email,$password,$roleid){
        $resultado = $this->db->prepare("INSERT INTO surrogate_keys.user(num_doc,documentid,status,names,surname,url_prof_pic,email,password,Roleid)
        VALUES ('$num_doc', $id_doc, 'Activo', '$name', '$surname',
        'https://www.onusanmiguel.com/wp-content/uploads/2021/04/unnamed.jpg'
        , '$email', '$password', '$roleid')");
            $resultado->execute();
    }
        }
        
/* 
 $sql="SELECT class.id, class.code, names, surname,class.status, subject FROM user 
        INNER JOIN surrogate_keys.document ON user.documentid = document.id 
        INNER JOIN user_class ON user_class.Userid = user.id 
        INNER JOIN class ON class.id = user_class.Classid;";
        $resultado = $this->db->prepare($sql);
        $resultado->execute();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $this->clases[] = $row;
        }
        return $this->clases; */
?>