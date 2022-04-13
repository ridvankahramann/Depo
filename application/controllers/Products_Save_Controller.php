<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_Save_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("keys"))
     redirect("login");
		$this->data = new stdClass();
		$this->data->alert = @$this->session->flashdata("alert");
	}

	public function index($id=null){
		$this->data->unit_menu = $this->db->get('unit')->result_array();
    if ($id) {
      $this->data->insert = $this->db->where('id', $id)->get('products')->row();
    }
		$this->load->view('back/page/products_save', $this->data);
	}
  public function save($id=null){
    if ($id) {
      $name_products = $this->input->post("payment");
      $code = $this->input->post("name");
      $description = $this->input->post("number");
      $unit = $this->input->post("exp");
      $this->data->products = array(
        "name_products" => $name_products,
        "code" => $code,
        "description" => $description,
        "unit" => $unit,
      );
      $this->data->update = $this->db->where('id', $id)->update('products', $this->data->products);
			$this->session->set_flashdata("alert", array("type" => "success", "title" => "Başarılı!", "text" => "Güncelleme İşlemi Başarılı", "buttonText" => "Tamam"));
			redirect('products_save');
    }else {
    $this->form_validation->set_rules('payment', 'Payment', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('number', 'Number', 'required');
    $this->form_validation->set_rules('exp', 'Exp', 'required');
    if($this->form_validation->run() == false){
      	$this->session->set_flashdata("alert", array("type" => "error", "title" => "Hata!", "text" => "Girdiğiniz değerler form standartlarına uymamaktadır.", "buttonText" => "Tamam"));
				redirect('products_save');
    }else {
      $name_products = $this->input->post("payment");
      $code = $this->input->post("name");
      $description = $this->input->post("number");
      $unit = $this->input->post("exp");
      $this->data->products = array(
        "name_products" => $name_products,
        "code" => $code,
        "description" => $description,
        "unit" => $unit,
      );
      $this->db->insert("products", $this->data->products);
			$this->session->set_flashdata("alert", array("type" => "success", "title" => "Başarılı!", "text" => "Kayıt İşlemi Başarılı", "buttonText" => "Tamam"));
			redirect('products_save');
    }
   }
  }

}
