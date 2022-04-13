<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("keys"))
     redirect("login");
		$this->data = new stdClass();
	}

	public function index(){
		$this->data->index_get = $this->db->get('order')->result_array();
		$this->load->view('back/page/list', $this->data);
	}
	public function delete($id){
		if ($id) {
			$this->db->where('id', $id)->delete('order');
			$this->db->where('order_id', $id)->delete('order_stocks');
		}
	}
	public function search(){
		if ($this->input->post('start-date',TRUE))
			$this->db->where('DATE(date) >=', $this->input->post('start-date',TRUE));
		if ($this->input->post('end-date',TRUE))
			$this->db->where('DATE(date) <=', $this->input->post('end-date',TRUE));
		if ($this->input->post('customer',TRUE))
			$this->db->like('name',$this->input->post('customer',TRUE),'match');

			$this->data->search = $this->db->get('order')->result_array();
			$this->load->view('back/page/list', $this->data);
	}

}
