<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {
    
	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Jakarta");
		if(!$this->session->userdata('userid')){
			redirect('login');
		}

		$this->load->model('jabatanmodel');
	}

	public function index(){
		$data['jabatan'] = $this->jabatanmodel->getJabatan();
		$this->template->display('master/jabatan/index', $data);
	}
}