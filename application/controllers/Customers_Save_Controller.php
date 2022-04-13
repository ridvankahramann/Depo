<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_Save_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("keys"))
     redirect("login");
		$this->data = new stdClass();
    $this->data->alert = @$this->session->flashdata("alert");
	}

	public function index($id=null){
		if ($id) {
			$this->data->customers_get = $this->db->where('id', $id)->get('customers')->row();
		}
		$this->load->view('back/page/customers_save', $this->data);
	}
  public function save($id=null){
		if ($id) {
			$payment = $this->input->post('payment');
			$name = $this->input->post('name');
			$number = $this->input->post('number');
			$ilce = $this->input->post('ilce');
			$vergi = $this->input->post('vergi');
			$no = $this->input->post('no');
			$this->data->customers = array(
				'company_name' => $payment,
				'address' => $name,
				'province' => $number,
				'district' => $ilce,
				'tax_office' => $vergi,
				'tax_number' => $no,
			);
			$this->data->update = $this->db->where('id', $id)->update('customers', $this->data->customers);
			$this->session->set_flashdata("alert", array("type" => "success", "title" => "Başarılı!", "text" => "Güncelleme İşlemi Başarılı", "buttonText" => "Tamam"));
			redirect('customers_save');
		}else {
	    $this->form_validation->set_rules('payment', 'Payment', 'required|min_length[3]');
	    $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
	    $this->form_validation->set_rules('number', 'Number', 'required|min_length[3]');
	    $this->form_validation->set_rules('ilce', 'Ilce', 'required|min_length[3]');
	    $this->form_validation->set_rules('vergi', 'Vergi', 'required|min_length[3]');
	    $this->form_validation->set_rules('no', 'No', 'required|min_length[3]');
	    if($this->form_validation->run() == false){
	      $this->session->set_flashdata("alert", array("type" => "error", "title" => "Hata!", "text" => "Girdiğiniz değerler form standartlarına uymamaktadır.", "buttonText" => "Tamam"));
				redirect('customers_save');
	    }else {
	      $payment = $this->input->post('payment');
	      $name = $this->input->post('name');
	      $number = $this->input->post('number');
	      $ilce = $this->input->post('ilce');
	      $vergi = $this->input->post('vergi');
	      $no = $this->input->post('no');
	      $this->data->customers = array(
	        'company_name' => $payment,
	        'address' => $name,
	        'province' => $number,
	        'district' => $ilce,
	        'tax_office' => $vergi,
	        'tax_number' => $no,
	      );
	      $this->db->insert('customers', $this->data->customers);
	      $this->session->set_flashdata("alert", array("type" => "success", "title" => "Başarılı!", "text" => "Kayıt İşlemi Başarılı", "buttonText" => "Tamam"));
				redirect('customers_save');
	    }
  }
}

}
