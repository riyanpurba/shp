<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManajemenAksesModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function getRole(){
		$query = $this->db->get('tbl_role');
		return $query->result_array();
	}

	public function getPermission(){
		$query = $this->db->get('tbl_permission');
		return $query->result_array();
	}
}