<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_List_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("keys"))
     redirect("login");
		$this->data = new stdClass();
	}

	public function index(){
		$this->data->unit_list = $this->db->get('unit')->result_array();
		$this->load->view('back/page/unit_list', $this->data);
	}
	public function search(){
		$keyword = $this->input->post('keyword');
		$this->data->search = $this->db->like('unit', $keyword)->get('unit')->result_array();
		$this->load->view('back/page/unit_list', $this->data);
	}
	public function delete($id){
		if ($id) {
			$this->db->where('id', $id)->delete('unit');
		}
	}
}
