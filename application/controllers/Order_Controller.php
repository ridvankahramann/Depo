<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
    if (!$this->session->has_userdata("keys"))
     redirect("login");
		$this->data = new stdClass();
    $this->data->alert = @$this->session->flashdata("alert");
	}

	public function index(){
		$this->load->view('back/page/order', $this->data);
	}
  public function search(){
    $keyword = $_POST["keyword"];
    if ($keyword) {
      $this->data->search = $this->db->or_like('id', $keyword)->or_like('company_name', $keyword)->get('customers')->result_array();
      echo json_encode($this->data->search);
    }
  }
  public function add($id){
    $this->data->add = $this->db->where('id', $id)->get('customers')->result_array();
    echo json_encode($this->data->add);
  }
  public function save(){
    $this->form_validation->set_rules('payment','Payment','required|min_length[3]');
    $this->form_validation->set_rules('textarea-input','Textarea-input','required|min_length[3]');
    $this->form_validation->set_rules('number','Number','required|min_length[3]');
    $this->form_validation->set_rules('exp','Exp','required|min_length[3]');
    $this->form_validation->set_rules('dairesi','Dairesi','required|min_length[3]');
    $this->form_validation->set_rules('no','No','required|min_length[3]');
    $this->form_validation->set_rules('datepicker','Datepicker','required|min_length[3]');
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata("alert", array("type" => "error", "title" => "Hata!", "text" => "Girdiğiniz değerler form standartlarına uymamaktadır.", "buttonText" => "Tamam"));
      redirect('order');
    }else {
        $payment = $this->input->post('payment');
        $textareainput = $this->input->post('textarea-input');
        $number = $this->input->post('number');
        $exp = $this->input->post('exp');
        $dairesi = $this->input->post('dairesi');
        $no = $this->input->post('no');
        $datepicker = $this->input->post('datepicker');
        $textareaexplanation = $this->input->post('textarea-explanation');
        $this->data->siparis = array(
          'name' => $payment,
          'address' => $textareainput,
          'province' => $number,
          'district' => $exp,
          'tax_office' => $dairesi,
          'tax_number' => $no,
          'date' => $datepicker,
          'explanation' => $textareaexplanation
        );
        $this->db->insert('order', $this->data->siparis);
        $this->session->set_flashdata("alert", array("type" => "success", "title" => "Başarılı!", "text" => "Kayıt İşlemi Başarılı", "buttonText" => "Tamam"));
        redirect('order');
      }
    }

}
