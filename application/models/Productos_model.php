<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

	public function getProductos(){
		$this->db->select("p.*, c.nombre as categoria, m.nombre as marca");
		$this->db->from("productos as p");
		$this->db->join("categorias as c","p.id_categoria = c.id")->join("marcas as m", "p.id_marca = m.id");
		$this->db->where("p.estado", "1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getProducto($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("productos");
		return $resultado->row();
	}
	public function save($data){
		return $this->db->insert("productos",$data);
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("productos",$data);
	}

}