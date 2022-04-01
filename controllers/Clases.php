<?php
class ClasesController{
    public function index(){
        require_once "models/ClasesModel.php";
        session_start();
        $clases = new Clases_model();
        $num_doc = $_SESSION['numero_docu'];
        $name_doc = $_SESSION['tipo_docu'];
        $data["clases"] = $clases->get_clases($num_doc,$name_doc);

        require_once "views/clases/clases.php";
    }
    public function nuevo(){
        require_once "views/clases/clases_nueva.php";
    }
}
?>