<?php if ( ! defined('BASEPATH')) exit('no se permite acceso directo al scrip');

/**
* 
*/
class Codigomodelo extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function crearCurso($data){
		$this->db->insert('cursos',array('nombreCurso'=>$data['nombre'],'videosCurso'=>$data['videos']));
	}
	function obtenerCursos(){
		$query = $this->db->get('cursos');
		if($query->num_rows()>0) return $query;
		else return false;
	}
	function obtenerCurso($id){
		$this->db->where('idCurso',$id);
		$query = $this->db->get('cursos');
		if($query->num_rows() > 0) return $query;
		else return false;
	}

	function actualizarCurso($id,$data){
		$datos =array(
			'nombreCurso'=> $data['nombre'],
			'videosCurso'=> $data ['videos']
			);
		$this->db->where('idCurso',$id);
		$query = $this->db->update('cursos',$datos);
	}

	function eliminarCurso($id){
		$this->db->delete('cursos',array('idCurso'=>$id));
	}
}

?>