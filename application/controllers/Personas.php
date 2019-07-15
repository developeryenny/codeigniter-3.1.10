<?php
class Personas extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Persona');
        $this->load->database();

    }
    function index() {

    }
    public function listado(){

    }
    public function guardar(){
        $this->load->view('personas/guardar');/**directorio donde está colocada nuestra vistas  seguido del nombre de la vista*/
        if ($this->input->server("REQUEST_METHOD") == "POST"){/**reconocer tipo de petición */
           /* echo "POST";*/ /**pruebas */
           /*echo $this->input->post("nombre");*/ /*pruebas*/
           $data["nombre"] =$this->input->post("nombre"); /*obtener los valores de los formularios*/
           $data["apellido"] =$this->input->post("apellido");
           $data["edad"] =$this->input->post("edad");
           $this->Persona->insert($data);/**insertar datos en la bd */
        }
    }
    public function borrar(){

    }


}
?>