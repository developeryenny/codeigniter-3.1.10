<?php
class Personas extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url'); /**para hacer redirecciones */
        $this->load->model('Persona');
        $this->load->library('form_validation');
        $this->load->database();

    }
    function index() {
      redirect("personas/listado"); /**http://[::1]/CodeIgniter-3.1.10/index.php/personas/ */
    }
    public function listado(){
      $vdata["personas"] = $this->Persona->findAll();
      $this->load->view('personas/listado', $vdata);
  
    }
    public function guardar($persona_id = null){
      $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]');/**para separar validaciones uso | */
      $this->form_validation->set_rules('apellido', 'Apellido', 'required');
      $this->form_validation->set_rules('edad', 'Edad', 'required');


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
           if ($this->form_validation->run()){/**nos devuelve true si las reglas de validaciones son correctas */
             if(isset($persona_id)){
                $this->Persona->update($persona_id, $data); /**actualizar registros */
            } else
              $this->Persona->insert($data);/**insertar registros en la bd */
          }  
        }
          /**presento el formulario vacío  */
        $this->load->view('personas/guardar', $vdata);/**directorio donde está colocada nuestra vistas  seguido del nombre de la vista*/

    }
    public function borrar($persona_id = null){
      $this->Persona->delete($persona_id);
      redirect("/personas/listado");

    }
    public function borrar_ajax($persona_id = null){
      $this->Persona->delete($persona_id);
      echo "hola1";

    }


   
    public function ver($persona_id = null){
      $persona = $this->Persona->find($persona_id);
        if(!isset($persona_id) || !isset($persona)){
          show_404();
        }

        if (isset($persona_id)){/**si existe una persona */
         
       /**si encontramos una persona devolvemos los datos de la persona */
       if(isset($persona)){ /**nuestra vista */
         $vdata["nombre"] = $persona->nombre; 
         $vdata["apellido"] = $persona->apellido;
         $vdata["edad"] = $persona->edad;
       }
     }
   
      $this->load->view('personas/ver', $vdata);/**directorio donde está colocada nuestra vistas  seguido del nombre de la vista*/


    }
  
}
?>