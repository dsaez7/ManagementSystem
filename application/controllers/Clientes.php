<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends MY_Controller {

	function __construct() {
		parent::__construct();      
    }

    public function index(){
    	$this->load->model("wmsclientes_model", "clientes");

    	$this->data['title'] = 'Cartera de Clientes (en Construcci&oacute;n)';

    	$this->data['clientes'] = $this->clientes->getClientes();

    	$this->page = 'clientes/homeclientes';
    	$this->layout();
    }

    public function add(){
    	$apPat = $this->input->post('apPat');
    }

}

?>