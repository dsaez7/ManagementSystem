<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends MY_Controller {

	function __construct() {
		parent::__construct();
		// $_SESSION['newSession'] = 'David Saez';     
    }

	public function index(){
		// $this->load->model('wmsproductos_model', 'productos');
		$this->load->model('wmscategorias_model', 'categorias');
		$this->load->model('wmsmarcas_model', 'marcas');
		$this->load->model('wmssubcategorias_model', 'subcategorias');

		$this->data['title'] = 'Administrador de Productos';

		// $this->data['getProductos'] = $this->productos->getProductos();
		$this->data['getCategorias'] = $this->categorias->getCategorias();
		$this->data['getMarcas'] = $this->marcas->getMarcas();
		$this->data['getSubCategorias'] = $this->subcategorias->getSubCategorias();

		$this->page = 'productos/homeproductos';
		$this->layout();
	}


	public function getProductosServerSide(){

		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$search = $this->input->post('search')['value'];

		if($search == ''){

			if($start == '' && $length == ''){
				$start = 0;
				$length = 5;
			}

			$this->load->model('wmsproductos_model', 'productos');
			$resp = $this->productos->getProductosServerSide($start, $length);

		}else{

			if($start == '' && $length == ''){
				$start = 0;
				$length = 5;
			}

			$this->load->model('wmsproductos_model', 'productos');
			$resp = $this->productos->getProductosServerSideSearching($start, $length, $search);

		}

		


		
		
		$data = $resp['data'];
		$qty = $resp['qty'];

		$datos = array();

		foreach ($data as $item) {
			$array = array();

			switch($item->oferta){
				case '0': $oferta = '<span class="label label-danger">No Disponible</span>'; break;
				case '1': $oferta = '<span class="label label-success">Disponible</span>'; break;
			}

			switch($item->stock){
				case $item->stock > 1: $stock = '<button class="btn btn-success btn-sm btn-circle ">'.$item->stock.'</button>'; break;
				case $item->stock = 1: $stock = '<button class="btn btn-danger btn-sm btn-circle">'.$item->stock.'</button>'; break;
			}

			$array['idproducto'] = $item->idproducto;
			$array['nombreCategoria'] = $item->nombreCategoria;
			$array['nombreSub'] = $item->nombreSub;
			$array['nombreMarca'] = $item->nombreMarca;
			$array['nombreProducto'] = $item->nombreProducto." (". $item->undPack." UND)";
			// $array['undPack'] = $item->undPack;
			$array['stock'] = $stock;
			$array['valorBruto'] = '$'.number_format($item->valorBruto, 0, ",", ".");
			$array['valorVenta'] = '$'.number_format($item->valorVenta, 0, ",", ".");
			$array['url'] = $item->url;
			$array['oferta'] = $oferta;
			$datos[] = $array;
		}

		$json_data = array(
						"draw"				=> intval($this->input->post('draw')),
						"recordsTotal" 		=> intval(count($data)),
						"recordsFiltered" 	=> intval($qty),
						"data"				=> $datos
					);

		echo json_encode($json_data);

	}

	public function agotados(){
		$this->load->model('wmsproductos_model', 'productos');

		$this->data['title'] = 'Productos Agotados';

		$this->data['productosAgotados'] = $this->productos->productosAgotados();
		
		$this->page = 'productos/agotadosproductos';
		$this->layout();
	}

	public function listado(){
		$this->load->model('wmscategorias_model', 'categorias');
		$this->load->model('wmsmarcas_model', 'marcas');

		$this->data['title'] = "Listado de Productos";
		$this->data['getCategorias'] = $this->categorias->getCategorias();
		$this->data['getMarcas'] = $this->marcas->getMarcas();

		$this->page = ('productos/listadoproductos');
		$this->layout();
	}

	public function getCategorias(){
		$this->load->model('wmscategorias_model', 'categorias');

		$listadocategorias = $this->categorias->getCategorias();	

		echo json_encode($listadocategorias);
	}
	
	public function subcategoriasxcategoria(){
		$this->load->model('wmssubcategorias_model', 'subcategorias');

		$idCategoria = $this->input->post('idCategoria');

		$lista = $this->subcategorias->subcategoriasxcategoria($idCategoria);

		echo json_encode($lista);
	}

	public function getMarcas(){
		$this->load->model('wmsmarcas_model', 'marcas');

		$listadomarcas = $this->marcas->getMarcas();

		echo json_encode($listadomarcas);
	}

	public function getListado(){
		$this->load->model('wmsproductos_model', 'productos');

		$idSku = $this->input->post('idSku');
		$idSubcategoria = $this->input->post('idSubcategoria');
		$idMarca = $this->input->post('idMarca');

		$listado = $this->productos->getListado($idSku, $idSubcategoria, $idMarca);

		echo json_encode($listado);
	}

	public function addProducto(){

		if($this->input->post()){
			
			$this->load->model("wmsproductos_model", "productos");

			$array = $this->input->post('params');

			$data = array(
				"nombre" => $array[0],
				"idmarca" => $array[1],
				"idsubcategoria" => $array[2],
				"undPack" => $array[3],
				"stock" => $array[4],
				"valorBruto" => $array[5],
				"valorVenta" => $array[6],
				"activo" => 1,
				"oferta" => 0
			);

			$resp = $this->productos->addProducto($data);

			echo json_encode($resp);
			
		}

	}

	public function editProducto(){

		if($this->input->post()){

			$idproducto = $this->input->post('idproducto');
			
			$this->load->model("wmsproductos_model", "productos");

			$resp = $this->productos->gerProductoByID($idproducto);

			echo json_encode($resp);

		}

	}

	public function updateProducto(){

		if($this->input->post()){

			$params = $this->input->post('params');

			$this->load->model("wmsproductos_model", "productos");

			$resp = $this->productos->updateProducto($params);

			echo json_encode($resp);
		}

	}

}



?>