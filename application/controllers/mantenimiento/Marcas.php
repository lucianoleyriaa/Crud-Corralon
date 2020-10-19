<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model("Marcas_model");
	}

	
	public function index()
	{
		$data  = array(
			'marcas' => $this->Marcas_model->getMarcas(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/marcas/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/marcas/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		$nombre = $this->input->post("nombre");

		$data  = array(
			'nombre' => $nombre, 
			'estado' => "1"
		);

		if ($this->Marcas_model->save($data)) {
			redirect(base_url()."mantenimiento/marcas");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/marcas/add");
		}
	}

	public function edit($id){
		$data  = array(
			'marcas' => $this->Marcas_model->getMarcas($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/marcas/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idMarcas = $this->input->post("idMarcas");
		$nombre = $this->input->post("nombre");

		$data = array(
			'nombre' => $nombre, 
			'descripcion' => $descripcion,
		);

		if ($this->Marcas_model->update($idMarcas,$data)) {
			redirect(base_url()."mantenimiento/marcas");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/marcas/edit/".$idMarcas);
		}
	}

	public function view($id){
		$data  = array(
			'marcas' => $this->Marcas_model->getMarcas($id), 
		);
		$this->load->view("admin/marcas/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Marcas_model->update($id,$data);
		echo "mantenimiento/marcas";
	}
}
