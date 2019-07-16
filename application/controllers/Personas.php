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
    public function guardar($persona_id = null){
        $vdata["nombre"] = $vdata["apellido"] = $vdata["edad"]= "";
        if (isset($persona_id)){/**si existe una persona */
           $persona = $this->Persona->find($persona_id); /**va buscar a la persona en bd */
        /**si encontramos una persona devolvemos los datos de la persona */
        if(isset($persona)){ /**nuestra vista */
          $vdata["nombre"] = $persona->nombre; 
          $vdata["apellido"] = $persona->apellido;
          $vdata["edad"] = $persona->edad;
        }
      }
        if ($this->input->server("REQUEST_METHOD") == "POST"){/**reconocer tipo de petición */
           /* echo "POST";*/ /**pruebas */
           /*echo $this->input->post("nombre");*/ /*pruebas*/
           $data["nombre"] =$this->input->post("nombre"); /*obtener los valores de los formularios*/
           $data["apellido"] =$this->input->post("apellido");
           $data["edad"] =$this->input->post("edad");
           $vdata["nombre"] =$this->input->post("nombre"); /**recuperar el valor en los formularios */
           $vdata["apellido"] = $this->input->post("apellido");
           $vdata["edad"] =$this->input->post("edad");
           if(isset($persona_id)){
            $this->Persona->update($persona_id, $data); /**actualizar registros */
            } else
              $this->Persona->insert($data);/**insertar registros en la bd */
          }
          /**presento el formulario vacío  */
        $this->load->view('personas/guardar', $vdata);/**directorio donde está colocada nuestra vistas  seguido del nombre de la vista*/

    }
    public function borrar(){

    }


}
?>