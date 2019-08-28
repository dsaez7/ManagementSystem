<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wmsmarcas_model extends CI_Model {

	public function getMarcas(){
		return $this->db
					->select('marca.idmarca')
					->select('marca.nombre')
					->from('ndcvdcdx_rootswarehousesystem.marca')
					->where('marca.activo', 1)
					->order_by('marca.nombre')
					->get()->result();
	}

}  



?>