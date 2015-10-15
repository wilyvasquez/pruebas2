<?php if ( ! defined('BASEPATH')) exit('no se permite acceso directo al scrip');
/**
* 
*/
class Prueba extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('codigomodelo');
	}

	function index(){
		$this->load->library('menu',array('Inicio','contacto','cursos'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('codigo/header');
		$this->load->view('codigo/bienvenido',$data);
	}

	function holaMundo(){
		$this->load->view('codigo/header');
		$this->load->view('codigo/bienvenido');	
	}
}
?>