<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Productos_model");
		$this->load->model("Categorias_model");
		$this->load->model("Marcas_model");
	}

	public function index()
	{
		$data  = array(
			'productos' => $this->Productos_model->getProductos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/list",$data);
		$this->load->view("layouts/footer");

	}
	public function add(){
		$data =array( 
			"categorias" => $this->Categorias_model->getCategorias(),
			"marcas" => $this->Marcas_model->getMarcas(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$codigo = $this->input->post("codigo");
		$nombre = $this->input->post("nombre");
		$peso = $this->input->post("peso");
		$precio_costo = $this->input->post("precio_costo");
		$precio_venta = $this->input->post("precio_venta");
		$id_categoria = $this->input->post("id_categoria");
		$id_marca = $this->input->post("id_marca");

		$data  = array(
			'codigo' => $codigo, 
			'nombre' => $nombre,
			'peso' => $peso,
			'precio_costo' => $precio_costo,
			'precio_venta' => $precio_venta,
			'id_categoria' => $id_categoria,
			'id_marca' => $id_marca,
			'estado' => "1"
		);

		if ($this->Productos_model->save($data)) {
			redirect(base_url()."mantenimiento/productos");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/productos/add");
		}
	}

	public function edit($id){
		$data =array( 
			"producto" => $this->Productos_model->getProducto($id),
			"categorias" => $this->Categorias_model->getCategorias(),
			"Marcas" => $this->Marcas_model->getMarcas()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idproducto = $this->input->post("idproducto");
		$codigo = $this->input->post("codigo");
		$nombre = $this->input->post("nombre");
		$peso = $this->input->post("peso");
		$precio_costo = $this->input->post("precio_costo");
		$precio_venta = $this->input->post("precio_venta");
		$id_categoria = $this->input->post("id_categoria");
		$id_marca = $this->input->post("id_marca");
		$data  = array(
			'codigo' => $codigo, 
			'nombre' => $nombre,
			'peso' => $peso,
			'precio_costo' => $precio_costo,
			'precio_venta' => $precio_venta,
			'id_categoria' => $id_categoria,
			'id_marca' => $id_marca,
		);
		if ($this->Productos_model->update($idproducto,$data)) {
			redirect(base_url()."mantenimiento/productos");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/productos/edit/".$idproducto);
		}
	}
	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Productos_model->update($id,$data);
		echo "mantenimiento/productos";
	}

}