<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Carrito extends MY_Controller {
	
	protected $cart_contents = array();

	function __construct() {
		parent::__construct();
	}

    public function agregar(){
    	$this->load->model("wmsproductos_model", "productos");

    	$idproducto = $this->input->post('idproducto');

    	$infoproducto = $this->productos->gerProductoByID($idproducto);

    	$this->cart_contents = $infoproducto;

    	echo json_encode($this->cart_contents );
    }

}

?>