<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_Save_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("keys"))
     redirect("login");
		$this->data = new stdClass();
		$this->data->alert = @$this->session->flashdata("alert");
	}

	public function index($id=null){
		if ($id) {
			$this->data->update_get = $this->db->select('order.*')->from('order')->where('order.id',$id)->get()->row();
			$this->data->get_table 	= $this->db->select('order_stocks.*')->from('order_stocks')->where('order_id',$id)->get()->result_array();
		}
		$this->load->view('back/page/list_save', $this->data);
	}
  public function customer_search(){
		$customer_keyword = $_POST["customer_keyword"];
		if ($customer_keyword) {
			$this->data->customer_search = $this->db->like('name', $customer_keyword)->get('order')->result_array();
			echo json_encode($this->data->customer_search);
		}
	}
	public function customer_add($id){
		$this->data->customer_add = $this->db->where('id',$id)->get('order')->result_array();
		echo json_encode($this->data->customer_add);
	}
  public function search(){
		$keyword = $_POST["customer"];
		if ($keyword) {
			$this->data->search = $this->db->or_like('name_products', $keyword)->or_like('code', $keyword)->get('products')->result_array();
			echo json_encode($this->data->search);
		}
	}
	public function add($id){
		$this->data->add = $this->db->where('id', $id)->get('products')->result_array();
		echo json_encode($this->data->add);
	}

	public function order_validate(){
		$this->form_validation->set_rules('name','Müşteri Adı','required|min_length[3]');
		$this->form_validation->set_rules('address','Adres','required|min_length[3]');
		$this->form_validation->set_rules('province','İl','required|min_length[3]');
		$this->form_validation->set_rules('town','İlçe','required|min_length[3]');
		$this->form_validation->set_rules('tax_office','Vergi Dairesi','required|min_length[3]');
		$this->form_validation->set_rules('tax_number','Vergi No','required|min_length[3]');
		$this->form_validation->set_rules('date','Tarih','required');
		return $this->form_validation->run();
	}

	public function save($id=null){
		if ($this->order_validate()) {
			$this->db->trans_start();
			$order_id = $id;
			$orderData = array(
							'customers_id'	=> $this->input->post('customers_id',TRUE),
							'name' 					=> $this->input->post('name',TRUE),
							'address' 			=> $this->input->post('address',TRUE),
							'province' 			=> $this->input->post('province',TRUE),
							'district' 			=> $this->input->post('town',TRUE),
							'tax_office'	 	=> $this->input->post('tax_office',TRUE),
							'tax_number' 		=> $this->input->post('tax_number',TRUE),
							'date' 					=> $this->input->post('date',TRUE),
							'explanation' 	=> $this->input->post('explanation',TRUE)
			);

			if (!$order_id) {
				if ($this->db->insert('order', $orderData))
					$order_id = $this->db->insert_id();
				else {
					$this->session->set_flashdata("alert", array("type" => "error", "title" => "Hata!", "text" => "Sipariş Kaydı Başarısız", "buttonText" => "Tamam"));
					$this->db->trans_rollback();
					redirect('list_save');
				}
			}else{
					if (!$this->db->where('id', $order_id)->update('order',$orderData)){
						$this->session->set_flashdata("alert", array("type" => "error", "title" => "Hata!", "text" => "Sipariş Kaydı Başarısız", "buttonText" => "Tamam"));
						$this->db->trans_rollback();
						redirect('list_save');
					}else {
						if(!$this->db->where('order_id',$order_id)->delete('order_stocks')){
							$this->session->set_flashdata("alert", array("type" => "error", "title" => "Hata!", "text" => "Stoklar Düzenlenemedi", "buttonText" => "Tamam"));
							$this->db->trans_rollback();
							redirect('list_save');
						}
					}
			}

			$stocks = array();
			foreach ($this->input->post('stock_code') as $key => $value) {
				array_push($stocks, array('order_id'=>$order_id, 'stock_code'=> $value, 'stock_name'=>$_POST['stock_name'][$key], 'amount'=>$_POST['stock_amount'][$key]));
			}

			if ($this->db->insert_batch('order_stocks',$stocks)) {
				$this->session->set_flashdata("alert", array("type" => "success", "title" => "Başarılı!", "text" => "Sipariş Başarı İle Kaydedildi", "buttonText" => "Tamam"));
				$this->db->trans_complete();
				redirect('list_save');
			}else{
				$this->session->set_flashdata("alert", array("type" => "error", "title" => "Başarılı!", "text" => "Stoklar Düzenlenemedi", "buttonText" => "Tamam"));
				$this->db->trans_rollback();
				redirect('list_save');
			}
		}else{
			$this->session->set_flashdata("alert", array("type" => "error", "title" => "Hata!", "text" => "Girdiğiniz değerler form standartlarına uymamaktadır.", "buttonText" => "Tamam"));
			redirect('list_save');
		}
	}

}
