<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DepartmentModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function getDepartment(){
		$query = $this->db->get('tbl_department');
		return $query->result_array();
	}
}