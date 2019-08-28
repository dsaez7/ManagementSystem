<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wmsproductos_model extends CI_Model {
   
    public function getProductosServerSide($start, $length){

        $aux = $this->db->select('*')
                        ->from('ndcvdcdx_rootswarehousesystem.producto')
                        ->where('producto.stock <>', 0)
                        ->get()->result();
        $qty = count($aux);

        $sql = $this->db->query("CALL getProductosServerSide($start, $length)");
        $data = $sql->result();

        $return = array("data" => $data, "qty" => $qty);

        return $return;

    }

    public function getProductosServerSideSearching($start, $length, $search){

        $aux = $this->db->select('*')
                        ->from('ndcvdcdx_rootswarehousesystem.producto')
                        ->where('producto.stock <>', 0)
                        ->like('producto.nombre', $search)                        
                        ->get()->result();
        $qty = count($aux);

        $sql = $this->db->query("CALL getProductosServerSideSearching($start, $length, '%$search%')");
        $data = $sql->result();

        $return = array("data" => $data, "qty" => $qty);

        return $return;


    }

    public function addProducto($data){

        $this->db->insert('ndcvdcdx_rootswarehousesystem.producto', $data);

        if($this->db->affected_rows() > 0){

            return 'ok';

        }else{

            return 'nok';
            
        }
        
    }

    public function updateProducto($data){
        
        $id = $data[0];

        $datos = array(
                    "nombre" => $data[1],
                    "idmarca" => $data[2],
                    "idsubcategoria" => $data[3],
                    "undPack" => $data[4],
                    "stock" => $data[5],
                    "valorBruto" => $data[6],
                    "valorVenta" => $data[7]
                );

        $this->db->where('producto.idproducto', $id)
                 ->update('ndcvdcdx_rootswarehousesystem.producto', $datos);

        if($this->db->affected_rows() > 0){
            return 'ok';
        }else{
            return 'nok';
        }

    }

    public function gerProductoByID($idproducto){
        return $this->db->select('A.idproducto idproducto')
                        ->select('A.nombre nombreprod')
                        ->select('B.idmarca idmarca')
                        ->select('C.idsubcategoria idsubcategoria')
                        ->select('D.idcategoria idcategoria')
                        ->select('A.undPack undpack')
                        ->select('A.stock stock')
                        ->select('A.valorBruto valorbruto')
                        ->select('A.valorVenta valorventa')
                        ->from('ndcvdcdx_rootswarehousesystem.producto A')
                        ->join('ndcvdcdx_rootswarehousesystem.marca B', 'A.idmarca = B.idmarca', 'left')
                        ->join('ndcvdcdx_rootswarehousesystem.subcategoria C', 'A.idsubcategoria = C.idsubcategoria', 'left')
                        ->join('ndcvdcdx_rootswarehousesystem.categoria D', 'C.idcategoria = D.idcategoria', 'left')
                        ->where('A.stock <>', 0)
                        ->where('A.idproducto', $idproducto)
                        ->get()->result();
    }
    
    public function productosAgotados(){
        return $this->db                        
                    ->select('c.nombre as nombreCategoria')
                    ->select('sc.nombre as nombreSub')    
                    ->select('m.nombre as nombreMarca')                        
                    ->select('p.nombre as nombreProducto')
                    ->select('p.undPack')
                    ->select('p.stock')
                    ->select('p.valorBruto')
                    ->select('p.valorVenta')
                    ->from('ndcvdcdx_rootswarehousesystem.producto p')
                    ->join('ndcvdcdx_rootswarehousesystem.subcategoria sc', 'p.idsubcategoria = sc.idsubcategoria', 'left')
                    ->join('ndcvdcdx_rootswarehousesystem.marca m', 'p.idmarca = m.idmarca', 'left')
                    ->join('ndcvdcdx_rootswarehousesystem.categoria c', 'c.idcategoria = sc.idcategoria', 'left')
                    // ->where('p.activo', 0)
                    ->where('p.stock', 0)
                    ->order_by('c.nombre')
                    ->order_by('sc.nombre')
                    ->order_by('m.nombre')
                    ->order_by('p.nombre')
                    ->get()->result();
    }

    public function valorInventario(){
        $query = "SUM(producto.stock * producto.valorBruto) as valorInventario";
        return $this->db->select($query)
                        ->from('ndcvdcdx_rootswarehousesystem.producto')
                        ->where('producto.stock >', 0)
                        // ->where('producto.activo', 1)
                        ->get()->result();
    }

    public function getListado($idSku = null, $idSubcategoria = null, $idMarca = null){
        
        if ($idSku == 1) {
            $this->db->where('producto.idsubcategoria', $idSubcategoria);
        }elseif($idSku == 2){
            $this->db->where('producto.idmarca', $idMarca); 
        }

        return $this->db->select('marca.nombre as nombreMarca')
                        ->select('producto.nombre as nombreProducto')
                        ->select('producto.undPack')
                        ->select('producto.valorVenta')
                        ->select('producto.oferta')
                        ->from('ndcvdcdx_rootswarehousesystem.producto')
                        ->join('ndcvdcdx_rootswarehousesystem.marca', 'producto.idmarca = marca.idmarca', 'left')
                        ->where('producto.stock >', 0)
                        // ->where('producto.activo', 1)            
                        ->order_by('marca.nombre')
                        ->order_by('producto.nombre')
                        ->get()->result();
    }

    public function valorizacionCategorias(){
        $query = "SUM(producto.stock * producto.valorBruto) as valorInventario";
        return $this->db->select($query)
                        ->select('categoria.nombre')
                        ->from('ndcvdcdx_rootswarehousesystem.producto')
                        ->join('ndcvdcdx_rootswarehousesystem.subcategoria', 'producto.idsubcategoria = subcategoria.idsubcategoria', 'left')
                        ->join('ndcvdcdx_rootswarehousesystem.categoria', 'subcategoria.idcategoria = categoria.idcategoria', 'left')
                        ->where('producto.stock >', 0)
                        // ->where('producto.activo', 1)
                        ->group_by('categoria.nombre')
                        ->order_by('categoria.nombre')
                        ->get()->result();
    }

    public function valorizacionBancos(){
        $query = "SUM(producto.stock * producto.valorBruto) as valorBanco";
        $sql = "(producto.idsubcategoria = 1 OR producto.idsubcategoria = 2)";
        return $this->db->select('marca.nombre')
                        ->select($query)
                        ->from('ndcvdcdx_rootswarehousesystem.producto')
                        ->join('ndcvdcdx_rootswarehousesystem.marca', 'producto.idmarca = marca.idmarca', 'left')
                        ->where('producto.stock >', 0) 
                        ->where($sql)
                        ->group_by('marca.nombre')
                        ->order_by('marca.nombre')
                        ->get()->result();
    }



}


?>