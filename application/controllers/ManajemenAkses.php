<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManajemenAkses extends CI_Controller {
    
	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Jakarta");
		if(!$this->session->userdata('userid')){
			redirect('login');
		}

		$this->load->model('manajemenaksesmodel');

	}

	public function index(){
		$data['groupuser'] = $this->manajemenaksesmodel->getRole();
		$this->template->display('utility/manajemen_akses/index', $data);
	}

	public function getPermission(){
		$data = $this->manajemenaksesmodel->getPermission();
		echo json_encode($data);
	}

	public function add_role(){
		$this->template->display('utility/role/add');
	}

	public function store_role(){
		$role['name'] = $this->input->post('role');
		// $saverole = $this->manajemenaksesmodel->storerole($role);

		$permission = array();
		$arr = ['create', 'read', 'update', 'delete'];
		for ($i=0; $i < count($arr); $i++) { 
			$permission[] = array(
				'name' => $this->input->post('role').'_'.$arr[$i],
				'keterangan' => $this->input->post('role')
			);
		}

		var_dump($permission);

		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil ditambahkan</div>');
		// redirect('manajemenakses');
	}
}