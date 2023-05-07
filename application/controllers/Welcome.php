<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		if(!$this->session->userdata('userid')){
			redirect('login');
		}

		$this->load->model('loginmodel');
	}

	public function index()
	{
		$this->template->display('dashboard');
	}

	function logout(){
		$signid = $this->session->userdata('signid');
		if ($signid <> ''){
			$this->loginmodel->simpan_log_out($signid);
		}

		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('isstatus');
		$this->session->unset_userdata('namestatus');
		redirect('login');
	}
}
