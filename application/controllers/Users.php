<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
    
	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Jakarta");
		if(!$this->session->userdata('userid')){
			redirect('login');
		}

		$this->load->model('jabatanmodel');
		$this->load->model('departmentmodel');
		$this->load->model('groupusermodel');

	}

	public function index(){
		$this->template->display('utility/users/index');
	}

	public function add() {
		$data['jabatan'] = $this->jabatanmodel->getJabatan();
		$data['department'] = $this->departmentmodel->getDepartment();
		$data['group_user'] = $this->groupusermodel->getGroupUser();
		$this->template->display('utility/users/add', $data);
	}
}