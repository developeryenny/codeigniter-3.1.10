<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	/**Definimos un constructor y cargamos nuestra librería */
	public function __construct(){
		parent::__construct();
		$this->load->database(); /**cargamos nuestra base de datos */

		$newdata = array( //segunda manera
			'name'  => 'Lola'
		  );
		$this->session->set_userdata($newdata);

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
    public function test()
	{
		$this->load->model('Persona'); /**cargamos nuestro modelo **/
		/**lo guardamos en una variable de tipo array llamado personas */
		/**solo para un registro */
		/*$persona = $this->Persona->find(1); *//**empleamos un método de nuestro objeto finAll()*/
		/*var_dump($persona);*//**imprimir colección de objetos */
		$personas = $this->Persona->findAll();/*todos los registros*/
		var_dump($personas);/*imprimos la colección de objetos*/
		$this->load->view('test');
	}
}
