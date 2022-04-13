<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("keys"))
     redirect("login");
		$this->data = new stdClass();
		$this->data->alert = @$this->session->flashdata("alert");
	}

	public function index($id=null){
		if ($id) {
			$this->data->insert = $this->db->where('id', $id)->get('unit')->row();
		}
		$this->load->view('back/page/unit', $this->data);
	}
  public function unit_save($id=null){
		if ($id) {
			$unit = $this->input->post('unit');
			$this->data->unit_array = array(
				'unit' => $unit,
			);
			$this->data->unit_update = $this->db->where('id',$id)->update('unit',$this->data->unit_array);
			$this->session->set_flashdata("alert", array("type" => "success", "title" => "Başarılı!", "text" => "Güncelleme İşlemi Başarılı", "buttonText" => "Tamam"));
			redirect('unit');
		}else{
    $this->form_validation->set_rules('unit', 'Unit', 'required|min_length[3]');
    if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata("alert", array("type" => "error", "title" => "Hata!", "text" => "Girdiğiniz değerler form standartlarına uymamaktadır.", "buttonText" => "Tamam"));
      redirect('unit');
    }else{
      $unit = $this->input->post('unit');
      $this->data->unit_array = array(
        'unit' => $unit,
      );
      $this->data->unit_insert = $this->db->insert('unit',$this->data->unit_array);
			$this->session->set_flashdata("alert", array("type" => "success", "title" => "Başarılı!", "text" => "Kayıt İşlemi Başarılı", "buttonText" => "Tamam"));
			redirect('unit');
    }
	}
}

}
