<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wmsclientes_model extends CI_Model {

	public function getClientes(){
		return $this->db
					->select('*')
					->from('ndcvdcdx_rootswarehousesystem.clientes')
					->get()->result();
	}

}  



?>