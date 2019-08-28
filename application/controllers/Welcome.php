<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct() {
		parent::__construct();      
    }

    public function index(){
    	$this->load->model('wmsproductos_model', 'productos');

    	$this->data['title'] = 'Dashboard de Administrador';
    	
    	$aux = $this->productos->valorInventario();
    	$aux = $aux[0]->valorInventario;
        
    	$this->data['valorInventario'] = '$'.number_format($aux, 0, ',', '.');

    	$this->data['valorizacionCategorias'] = $this->productos->valorizacionCategorias();
        $this->data['valorBancos'] = $this->productos->valorizacionBancos();

    	$this->page = 'welcome';
    	$this->layout();
    }


}