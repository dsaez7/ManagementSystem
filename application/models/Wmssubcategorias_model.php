<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wmssubcategorias_model extends CI_Model {

	public function	getSubCategorias(){

		return $this->db->select('*')
						->from('ndcvdcdx_rootswarehousesystem.subcategoria')
						->where('subcategoria.activo', 1)
						->get()->result();

	}

	public function subcategoriasxcategoria($idCategoria){

		return $this->db
					->select('subcategoria.idsubcategoria')
					->select('subcategoria.nombre')
					->from('ndcvdcdx_rootswarehousesystem.subcategoria')
					->where('subcategoria.idcategoria', $idCategoria)
					->where('subcategoria.activo', 1)
					->order_by('subcategoria.nombre')
					->get()->result();
					
	}


}

?>
