<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GroupUserModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function getGroupUser(){
		$query = $this->db->get('tbl_group_user');
		return $query->result_array();
	}
}