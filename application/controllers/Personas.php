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
    function llamar_helper(){
        $this->load->helper('list_person_helper');
        /**var_dump(list_person());*/
        /**$vdata["personas"] = list_person(); 
        $this->load->view('personas/llamar_helper', $vdata);*/
        /**otra manera de usar el helper, es llamarla directaente y llamar la función helper desde view como lost_person()*/
        $this->load->view('personas/llamar_helper');
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


     $error= $vdata["image"] = $vdata["nombre"] = $vdata["apellido"] = $vdata["edad"]= "";
        if (isset($persona_id)){/**si existe una persona */
           $persona = $this->Persona->find($persona_id); /**va buscar a la persona en bd */
        /**si  encontramos una persona devolvemos los datos de la persona */
        if(isset($persona)){ /**nuestra vista */
          $vdata["nombre"] = $persona->nombre; 
          $vdata["apellido"] = $persona->apellido;
          $vdata["edad"] = $persona->edad;
          $vdata["image"] = $persona->image;
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
                $persona_id = $this->Persona->insert($data);/**insertar registros en la bd */
                $error = $this->do_upload($persona_id);
                if ($error === "") /**si no tengo errores recargo la página con el redirect */
                  redirect("/personas/guardar/$persona_id");
          }  
        }
        $vdata["error"] = $error;
     
        /**presento el formulario vacío  */
        $this->load->view('/personas/guardar', $vdata);/**directorio donde está colocada nuestra vistas  seguido del nombre de la vista*/

    }
    private function do_upload($persona_id)
    {
            $config['upload_path']          = 'uploads';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048 ;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')){
                  return $this->upload->display_errors();
            }else{
          
                   $data = $this->upload->data();
                   var_dump($data); /** para saber que nos devuelve la data */
                   $name = $data["file_name"] . $data["file-ext"];
                   $save = array(
                    'image' => $name
                );
                $this->Persona->update($persona_id, $save);
            }
            return "";
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