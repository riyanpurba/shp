<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JabatanModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function getJabatan(){
		$query = $this->db->get('tbl_jabatan');
		return $query->result_array();
	}
}