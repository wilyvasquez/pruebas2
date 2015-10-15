<?php if ( ! defined('BASEPATH')) exit('no se permite acceso directo al scrip');

/**
* 
*/
class Cursos extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('codigomodelo');
	}

	function index(){
		$data['segmento'] = $this->uri->segment(3);
		$this->load->view('codigo/header');
		if(!$data['segmento']){
			$data['cursos'] = $this->codigomodelo->obtenerCursos();		
		}
		else{
			$data['cursos'] = $this->codigomodelo->obtenerCurso($data['segmento']);
		}
			$this->load->view('cursos/cursos',$data);
	}

	function nuevo(){
		$this->load->view('codigo/header');
		$this->load->view('cursos/formulario');
	}

	function recibirDatos(){
		$data = array(
			'nombre' => $this ->input->post('nombre') ,
			'videos' => $this ->input->post('videos') 
		);
		$this->codigomodelo->crearCurso($data);
		$this->load->view('codigo/header');
		$this->load->view('codigo/bienvenido');	
	}

	function editar(){
		$data['id']= $this->uri->segment(3);
		$data['curso'] = $this->codigomodelo->obtenerCurso($data['id']);
		$this->load->view('codigo/header');
		$this->load->view('cursos/editar',$data);
	}

	function actualizar(){
		$data =array(
			'nombre'=> $this->input->post('nombre'),
			'videos' => $this->input->post('videos')
			);
		$this->codigomodelo->actualizarCurso($this->uri->segment(3),$data);
		$this->load->view('codigo/header');
		$this->load->view('codigo/bienvenido');	
	}

	function borrar(){
		$id= $this->uri->segment(3);
		$this->codigomodelo->eliminarCurso($id);
	}
}
?>