<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Save_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("keys"))
     redirect("login");
		$this->data = new stdClass();
	}

	public function index(){
		$this->load->view('back/page/save', $this->data);
	}
}
