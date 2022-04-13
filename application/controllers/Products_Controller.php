<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("keys"))
     redirect("login");
		$this->data = new stdClass();
	}

	public function index(){
		$this->data->query = $this->db->select('products.id, products.name_products, products.code, products.description, unit.unit')->from('products')->join('unit', 'unit.id = products.unit','left')->get()->result_array();
		$this->load->view('back/page/products', $this->data);
	}
	public function search(){
		$keyword = $this->input->post('keyword');
		$this->data->search = $this->db->like('code', $keyword)->get('products')->result_array();
		$this->load->view('back/page/products', $this->data);
	}
	public function delete($id){
		if ($id) {
			$this->db->where('id', $id)->delete('products');
		}
	}

}
