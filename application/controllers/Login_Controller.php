<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->data = new stdClass();
    $this->data->alert = @$this->session->flashdata("alert");
	}

	public function index(){
		$this->load->view('back/page/login', $this->data);
	}
  public function control(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
    if ($this->form_validation->run() == FALSE){
      $this->session->set_flashdata("alert", array("type" => "error", "title" => "Hata!", "text" => "Girdiğiniz değerler form standartlarına uymamaktadır.", "buttonText" => "Tamam"));
      redirect('login');
    }else{
      $email = $this->input->post("email");
      $password = $this->input->post("password");
      $login = $this->db->where(array("email" => $email, "password" => md5($password) , "status" => 1))->from("login")->count_all_results();
      if ($login == 1) {
        $this->session->set_userdata("keys",$email);
        redirect(base_url("index.php/list"));
      }else {
        $this->session->set_flashdata("alert", array("type" => "error", "title" => "Hata!", "text" => "Kullanıcı yada Şifre Hatalı ", "buttonText" => "Tamam"));
        redirect("login");
      }
    }
  }
  public function logOut(){
		$this->session->unset_userdata("keys");
    $this->session->sess_destroy();
		redirect("login");
	}

}
