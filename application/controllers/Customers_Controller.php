<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("keys"))
     redirect("login");
		$this->data = new stdClass();
	}

	public function index(){
		$this->data->customers_get = $this->db->get('customers')->result_array();
		$this->load->view('back/page/customers', $this->data);
	}
	public function search(){
		if ($this->input->post('keyword')) {
			$keyword = $this->input->post('keyword');
			$this->data->search = $this->db->like('company_name', $keyword)->get('customers')->result_array();
			$this->load->view('back/page/customers', $this->data);
		}
	}
	public function delete($id){
		if ($id) {
			$this->db->where('id',$id)->delete('customers');
		}
	}
}
