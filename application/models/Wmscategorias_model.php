<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Wmscategorias_model extends CI_Model {

	public function getCategorias(){
		return $this->db
					->select('categoria.idcategoria')
					->select('categoria.nombre')
					->from('ndcvdcdx_rootswarehousesystem.categoria')
					->where('categoria.activo =', 1)
					->order_by('categoria.nombre')
					->get()->result();
	}


}



?>