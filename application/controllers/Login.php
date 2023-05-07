<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
    
	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set("Asia/Jakarta");
		if($this->session->userdata('userid') != ''){
			redirect('welcome');
		}

		$this->load->model('loginmodel');
	}

	function index(){
		$this->load->view('auth/login');
	}

	function login_user(){
		$userID = $this->input->post('username');
		$passID = md5(sha1($this->input->post('password')));
		$lo = $this->cekLogin($userID,$passID);
		switch ($lo){
			case 0 :
				redirect('login');
				break;
			case 1 :
				redirect('login');
				break;
			case 2 :
				redirect('login');
				break;
			case 3 :
				redirect('login');
				break;
			case 10 :
				redirect('login');
				break;
			case 100 :
				redirect('welcome');
				break;
		}
	}

	function cekLogin($userID, $passID){
		$log    = $this->loginmodel->log_in($userID);
		$cek    = $this->loginmodel->cekpass($userID,$passID);

		if($log->num_rows()>0){
			$row = $log->row();
			if($row->active === 0){
				$this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>User Sudah Tidak Aktif Lagi.</strong></div>");
				return 1;
			}elseif($cek === true){
				$this->session->set_userdata('userid',$userID);
				$this->session->set_userdata('nama',$row->nama);	//mengambil field UserName untuk disimpan di session
				$this->session->set_userdata('username',$row->username);
				$this->session->set_userdata('isstatus',$row->is_status);
				$this->session->set_userdata('namestatus',$row->name_status);
				$this->set_info_device();
				$this->simpan_log();
				return 100;
			}else{
				$this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>Password Anda Salah.</strong></div>");
				return 3;
			}
		}else{
			$this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>User $userID Tidak Terdaftar.</strong></div>");
			return 0;
		}
	}

	function set_info_device(){
		$ipaddr=$_SERVER['REMOTE_ADDR'];
		$this->session->set_userdata('ipaddress', $ipaddr);

		$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		$this->session->set_userdata('hostname', $hostname);
	}

    function simpan_log(){
			$this->load->library(array('user_agent','mobile_detect','misc'));

			$detect = new Mobile_Detect();

			$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? '' : '') : 'PC');

			foreach($detect->getRules() as $name => $regex):
				$check = $detect->{'is'.$name}();
				if($check == 'true'){
						$deviceType .= $name.' ';
				}
			endforeach;

			if ($this->agent->is_browser()){
				$agent = $this->agent->browser().' '.$this->agent->version();
			}elseif ($this->agent->is_robot()){
				$agent = $this->agent->robot();
			}elseif ($this->agent->is_mobile()){
				$agent = $this->agent->mobile();
			}else{
				$agent = 'Unidentified User Agent';
			}

			$info = array (
				'tanggal'   => date('Y-m-d H:i:s'),
				'signin'    => date('Y-m-d H:i:s'),
				'userid'	=> strtoupper($this->session->userdata('userid')),
				'hostname'	=> $this->session->userdata('hostname'),
				'ipaddress'	=> $this->session->userdata('ipaddress'),
				'device'	=> $deviceType,
				'browser'	=> $agent,
				'platform'	=> $this->misc->platform(),
				'user_agent'=> $this->agent->agent_string()
			);

			$signid = $this->loginmodel->simpan_log($info);
			if ($signid === 0){
				$this->session->set_userdata('signid',0);
			}else{
				$this->session->set_userdata('signid',$signid);
			}
	}
}