<?php
class Personas extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');

    }
    function index() {

    }
    public function listado(){

    }
    public function guardar(){
        $this->load->view('personas/guardar');/**directorio donde está colocada nuestra vistas  seguido del nombre de la vista*/
    }
    public function borrar(){

    }


}
?>