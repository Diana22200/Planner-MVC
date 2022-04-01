<?php
class ClasesController{
    public function index(){
        require_once "models/ClasesModel.php";
        $clases = new Clases_model();
        $data["clases"] = $clases->get_clases();

        require_once "views/clases/clases.php";
    }
    public function nuevo(){
        require_once "views/clases/clases_nueva.php";
    }
}
?>