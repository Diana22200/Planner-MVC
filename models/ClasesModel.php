<?php
class Clases_model{
    private $db;
    private $clases;

    public function __construct(){
        $this->db =Database::connect();
        $this->clases = array();
    }

}
?>